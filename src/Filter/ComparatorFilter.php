<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Filter;

use Ulrack\Dbal\Common\QueryFilterInterface;
use Ulrack\Dbal\Common\ParameterizedQueryComponentInterface;
use Ulrack\Dbal\Sql\Common\ComparatorEnum;

class ComparatorFilter implements
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
        $this->column = $column;
        $this->value = $value;
        $this->comparator = (string) $comparator;
    }

    /**
     * Retrieves the filter.
     *
     * @return string
     */
    public function getFilter(): string
    {
        $prepared = '?';
        if (is_array($this->value)) {
            $prepared = $prepared . str_repeat(', ?', count($this->value) - 1);
        }

        return $this->column . ' ' . sprintf($this->comparator, $prepared);
    }

    /**
     * Retrieves an array of filter parameters.
     *
     * @return array
     */
    public function getParameters(): array
    {
        if ($this->comparator === ComparatorEnum::COMPARATOR_NOT_NULL
        || $this->comparator === ComparatorEnum::COMPARATOR_IS_NULL) {
            return [];
        }

        if (!is_array($this->value)) {
            return [$this->value];
        }

        return $this->value;
    }
}
