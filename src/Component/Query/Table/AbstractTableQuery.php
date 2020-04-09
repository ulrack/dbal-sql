<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Component\Query\Table;

use Ulrack\Dbal\Common\QueryInterface;
use Ulrack\Dbal\Sql\Common\ColumnTypeEnum;
use Ulrack\Dbal\Sql\Common\ColumnAttributeEnum;
use Ulrack\Dbal\Sql\Common\ColumnDefaultEnum;

abstract class AbstractTableQuery implements QueryInterface
{
    /**
     * Contains the columns for the table query.
     *
     * @var array
     */
    private $columns = ['add' => [], 'drop' => [], 'alter' => []];

    /**
     * Contains the keys for the table.
     *
     * @var array
     */
    private $keys = ['add' => [], 'drop' => []];

    /**
     * Adds a primary key to the query.
     *
     * @param string ...$keys
     *
     * @return void
     */
    public function addPrimaryKey(string ...$keys): void
    {
        $this->keys['add'][] = sprintf(
            'CONSTRAINT PRIMARY KEY(`%s`)',
            implode('`, `', $keys)
        );
    }

    /**
     * Drops the primary key from the table.
     *
     * @return void
     */
    public function dropPrimaryKey(): void
    {
        $this->keys['drop'][] = 'DROP PRIMARY KEY';
    }

    /**
     * Adds a foreign key to the table query.
     *
     * @param  string        $column
     * @param  string        $table
     * @param  string        $tableColumn
     *
     * @return void
     */
    public function addForeignKey(
        string $keyName,
        string $column,
        string $table,
        string $tableColumn
    ): void {
        $this->keys['add'][] = sprintf(
            'CONSTRAINT %s FOREIGN KEY(%s) REFERENCES %s(%s)',
            $keyName,
            $column,
            $table,
            $tableColumn
        );
    }

    /**
     * Drops a foreign key.
     *
     * @param string $keyName
     *
     * @return void
     */
    public function dropForeignKey(string $keyName): void
    {
        $this->keys['drop'][] = sprintf(
            'DROP FOREIGN KEY %s',
            $keyName
        );
    }

    /**
     * Returns the key query statements.
     *
     * @return array
     */
    public function getKeys(): array
    {
        return $this->keys;
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
     */
    public function addColumn(
        string $column,
        ColumnTypeEnum $type,
        string $typeOption = null,
        ColumnDefaultEnum $default = null,
        ColumnAttributeEnum $attribute = null,
        bool $null = true,
        bool $autoIncrement = false,
        bool $unique = false,
        string $comment = ''
    ): void {
        $default = $default !== null ? "'" . $default . "'" : '';

        $this->columns['add'][] = sprintf(
            '`%s` %s%s%s%s%s%s%s%s',
            $column,
            $type,
            $typeOption === null ? '' : sprintf('(%s)', $typeOption),
            $attribute === null ? '' : sprintf(' %s ', $attribute),
            $null ? ' NULL' : ' NOT NULL',
            $default === '' ? '' : ' DEFAULT ' . $default,
            $autoIncrement ? ' AUTO_INCREMENT' : '',
            $unique ? ' UNIQUE' : '',
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
     */
    public function alterColumn(
        string $column,
        ColumnTypeEnum $type,
        string $typeOption = null,
        ColumnDefaultEnum $default = null,
        ColumnAttributeEnum $attribute = null,
        bool $null = true,
        bool $autoIncrement = false,
        bool $unique = false,
        string $comment = '',
        string $newName = ''
    ): void {
        $default = $default !== null ? "'" . $default . "'" : '';

        $this->columns['alter'][] = sprintf(
            (empty($newName) ? 'MODIFY ' : 'ALTER ') . '`%s` %s%s%s%s%s%s%s%s',
            $column . (empty($newName) ? '' : '` `' . $newName),
            $type,
            $typeOption === null ? '' : sprintf('(%s)', $typeOption),
            $attribute === null ? '' : sprintf(' %s ', $attribute),
            $null ? ' NULL' : ' NOT NULL',
            $default === '' ? '' : ' DEFAULT ' . $default,
            $autoIncrement ? ' AUTO_INCREMENT' : '',
            $unique ? ' UNIQUE' : '',
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
        $this->columns['drop'][] = sprintf('DROP COLUMN `%s`', $column);
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
