<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Component\Filter;

use Ulrack\Dbal\Common\QueryFilterInterface;
use Ulrack\Dbal\Sql\Common\ComparatorEnum;

class RelationalComparatorFilter implements QueryFilterInterface
{
    /**
     * Contains the column for the comparison.
     *
     * @var string
     */
    private $column;

    /**
     * Contains the value for the filter.
     *
     * @var mixed
     */
    private $value;

    /**
     * Contains the comparator.
     *
     * @var string
     */
    private $comparator;

    /**
     * Constructor
     *
     * @param string $column
     * @param mixed  $value
     * @param ComparatorEnum $comparator
     */
    public function __construct(
        string $column,
        $value,
        ComparatorEnum $comparator
    ) {
        $this->column     = $column;
        $this->value      = $value;
        $this->comparator = (string) $comparator;
    }

    /**
     * Retrieves the filter.
     *
     * @return string
     */
    public function getFilter(): string
    {
        return $this->column . ' ' . sprintf(
            $this->comparator,
            is_array($this->value) ? implode(', ', $this->value) : $this->value
        );
    }
}
