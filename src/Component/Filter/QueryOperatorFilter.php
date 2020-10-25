<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Component\Filter;

use Ulrack\Dbal\Common\QueryInterface;
use Ulrack\Dbal\Common\QueryFilterInterface;
use Ulrack\Dbal\Common\ParameterizedQueryComponentInterface;
use Ulrack\Dbal\Sql\Common\ComparatorEnum;
use Ulrack\Dbal\Sql\Common\OperatorEnum;

class QueryOperatorFilter implements
    QueryFilterInterface,
    ParameterizedQueryComponentInterface
{
    /**
     * Contains the column for the comparison.
     *
     * @var string
     */
    private $column;

    /**
     * Contains the query for the filter.
     *
     * @var QueryInterface
     */
    private $query;

    /**
     * Contains the comparator.
     *
     * @var string
     */
    private $comparator;

    /**
     * Contains the operator.
     *
     * @var string
     */
    private $operator;

    /**
     * Constructor
     *
     * @param string         $column
     * @param QueryInterface $query
     * @param ComparatorEnum $comparator
     * @param OperatorEnum   $operator
     */
    public function __construct(
        string $column,
        QueryInterface $query,
        ComparatorEnum $comparator,
        OperatorEnum $operator
    ) {
        $this->column     = $column;
        $this->query      = $query;
        $this->comparator = (string) $comparator;
        $this->operator   = (string) $operator;
    }

    /**
     * Retrieves the filter.
     *
     * @return string
     */
    public function getFilter(): string
    {
        return sprintf(
            '%s %s',
            $this->column,
            sprintf(
                $this->comparator,
                sprintf(
                    '%s (%s)',
                    $this->operator,
                    rtrim($this->query->getQuery(), ';')
                )
            )
        );
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
