<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Filter;

use Ulrack\Dbal\Common\ParameterizedQueryComponentInterface;
use Ulrack\Dbal\Common\QueryFilterInterface;
use Ulrack\Dbal\Common\QueryInterface;

class ExistsFilter implements
    QueryFilterInterface,
    ParameterizedQueryComponentInterface
{
    /**
     * Contains the query for the exists filter.
     *
     * @var QueryInterface
     */
    private $query;

    /**
     * Constructor
     *
     * @param QueryInterface $query
     */
    public function __construct(QueryInterface $query)
    {
        $this->query = $query;
    }

    /**
     * Retrieves the filter.
     *
     * @return string
     */
    public function getFilter(): string
    {
        return sprintf('EXISTS (%s)', rtrim($this->query->getQuery(), ';'));
    }

    /**
     * Retrieves an array of filter parameters.
     *
     * @return array
     */
    public function getParameters(): array
    {
        if ($this->query instanceof ParameterizedQueryComponentInterface) {
            return $this->query->getParameters();
        }

        return [];
    }
}
