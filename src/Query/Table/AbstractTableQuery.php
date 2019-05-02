<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Query\Table;

use Ulrack\Dbal\Common\QueryInterface;
use Ulrack\Dbal\Sql\Common\ColumnTypeEnum;
use Ulrack\Dbal\Sql\Common\ColumnAttributeEnum;
use Ulrack\Dbal\Sql\Common\IndexTypeEnum;
use Ulrack\Dbal\Sql\Common\ColumnDefaultEnum;

abstract class AbstractTableQuery implements QueryInterface
{
    /**
     * Contains the indices for the table query.
     *
     * @var array
     */
    private $indices = ['add' => [], 'drop' => []];

    /**
     * Contains the columns for the table query.
     *
     * @var array
     */
    private $columns = ['add' => [], 'drop' => [], 'alter' => [], 'change' => []];

    /**
     * Adds an add index operation to the table query.
     *
     * @param IndexTypeEnum $type
     * @param string        $columns
     *
     * @return void
     */
    public function addIndex(IndexTypeEnum $type, string ...$columns): void
    {
        $this->indices['add'][] = sprintf(
            '%s(%s)',
            $type,
            empty($columns) ?: '`' . implode('`, `', $columns) . '`'
        );
    }

    /**
     * Adds a drop index operation to the query.
     *
     * @param string $column
     *
     * @return void
     */
    public function dropIndex(string $column): void
    {
        $this->indices['drop'][] = sprintf('`%s`', $column);
    }

    /**
     * Retrieves a list of index operations.
     *
     * @return array
     */
    public function getIndices(): array
    {
        return $this->indices;
    }

    /**
     * Adds an add column operation to the operation list for the query.
     *
     * @param string              $column
     * @param ColumnTypeEnum      $type
     * @param string              $typeOption
     * @param ColumnDefaultEnum   $default
     * @param ColumnAttributeEnum $attribute
     * @param boolean             $null
     * @param boolean             $autoIncrement
     * @param string              $comment
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function addColumn(
        string $column,
        ColumnTypeEnum $type,
        string $typeOption = null,
        ColumnDefaultEnum $default = null,
        ColumnAttributeEnum $attribute = null,
        bool $null = true,
        bool $autoIncrement = false,
        string $comment = ''
    ): void {
        $default = $default !== null && (string) $default
            ? '' : "'" . $default . "'";

        $this->columns['add'][] = sprintf(
            '`%s` %s%s%s%s%s%s%s',
            $column,
            $type,
            $typeOption === null ? '' : sprintf('(%s)', $typeOption),
            $attribute === null ? '' : sprintf(' %s ', $attribute),
            $null ? ' NULL' : ' NOT NULL',
            $default === '' ? '' : ' DEFAULT ' . $default,
            $autoIncrement ? ' AUTO_INCREMENT' : '',
            empty($comment) ? '' : sprintf(" COMMENT '%s'", $comment)
        );
    }

    /**
     * Adds an alter column operation to the operation list for the query.
     *
     * @param string              $column
     * @param ColumnTypeEnum      $type
     * @param string              $typeOption
     * @param ColumnDefaultEnum   $default
     * @param ColumnAttributeEnum $attribute
     * @param boolean             $null
     * @param boolean             $autoIncrement
     * @param string              $comment
     * @param string              $newName
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function alterColumn(
        string $column,
        ColumnTypeEnum $type,
        string $typeOption = null,
        ColumnDefaultEnum $default = null,
        ColumnAttributeEnum $attribute = null,
        bool $null = true,
        bool $autoIncrement = false,
        string $comment = '',
        string $newName = ''
    ): void {
        $default = $default !== null && (string) $default
            ? '' : "'" . $default . "'";

        $this->columns[empty($newName) ? 'alter' : 'change'][] = sprintf(
            '`%s` %s%s%s%s%s%s%s',
            $column . empty($newName) ? '' : ' `' . $newName . '`',
            $type,
            $typeOption === null ? '' : sprintf('(%s)', $typeOption),
            $attribute === null ? '' : sprintf(' %s ', $attribute),
            $null ? ' NULL' : ' NOT NULL',
            $default === '' ? '' : ' DEFAULT ' . $default,
            $autoIncrement ? ' AUTO_INCREMENT' : '',
            empty($comment) ? '' : sprintf(" COMMENT '%s'", $comment)
        );
    }

    /**
     * Adds a drop column operation to the query.
     *
     * @param string $column
     *
     * @return void
     */
    public function dropColumn(string $column): void
    {
        $this->columns['drop'][] = sprintf('`%s`', $column);
    }

    /**
     * Retrieves a list of column operations.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return $this->columns;
    }
}
