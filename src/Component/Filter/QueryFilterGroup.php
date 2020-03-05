<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Component\Filter;

use Ulrack\Dbal\Common\QueryFilterGroupInterface;
use Ulrack\Dbal\Common\QueryFilterInterface;
use Ulrack\Dbal\Common\ParameterizedQueryComponentInterface;

class QueryFilterGroup implements
    QueryFilterGroupInterface,
    ParameterizedQueryComponentInterface
{
    /**
     * Contains the filters.
     *
     * @var array
     */
    private $filters;

    /**
     * Adds a filter to the query.
     *
     * @param QueryFilterInterface $filter
     *
     * @return void
     */
    public function addFilter(QueryFilterInterface $filter): void
    {
        $this->filters[] = $filter;
    }

    /**
     * Retrieves the filter group.
     *
     * @return string
     */
    public function getFilterGroup(): string
    {
        if (empty($this->filters)) {
            return '';
        }

        $filters = [];
        foreach ($this->filters as $filter) {
            $filters[] = $filter->getFilter();
        }

        return implode(' AND ', $filters);
    }

    /**
     * Retrieves an array of filter group parameters.
     *
     * @return array
     */
    public function getParameters(): array
    {
        if (empty($this->filters)) {
            return [];
        }

        $parameters = [];
        foreach ($this->filters as $filter) {
            if ($filter instanceof ParameterizedQueryComponentInterface) {
                $parameters = array_merge(
                    $parameters,
                    $filter->getParameters()
                );
            }
        }

        return $parameters;
    }
}
