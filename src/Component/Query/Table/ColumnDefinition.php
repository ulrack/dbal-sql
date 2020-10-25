<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Component\Query\Table;

use Ulrack\Dbal\Sql\Common\ColumnTypeEnum;
use Ulrack\Dbal\Sql\Common\ColumnDefaultEnum;
use Ulrack\Dbal\Sql\Common\ColumnAttributeEnum;
use Ulrack\Dbal\Sql\Common\ColumnDefinitionInterface;

class ColumnDefinition implements ColumnDefinitionInterface
{
    /**
     * Contains the name of the column.
     *
     * @var string
     */
    private $name;

    /**
     * Contains the type of the column.
     *
     * @var ColumnTypeEnum
     */
    private $type;

    /**
     * Contains the type option value.
     *
     * @var string|null
     */
    private $typeOption;

    /**
     * Contains the default value of the column.
     *
     * @var ColumnDefaultEnum|null
     */
    private $default;

    /**
     * Contains the attribute of the column.
     *
     * @var ColumnAttributeEnum|null
     */
    private $attribute;

    /**
     * Whether the column is nullable.
     *
     * @var bool
     */
    private $nullable = false;

    /**
     * Whether the column can auto increment.
     *
     * @var bool
     */
    private $autoIncrement = false;

    /**
     * Whether the column is unique.
     *
     * @var bool
     */
    private $unique = false;

    /**
     * Contains the comment of the column.
     *
     * @var string
     */
    private $comment = '';

    /**
     * Constructor.
     *
     * @param string $name
     * @param ColumnTypeEnum $type
     */
    public function __construct(string $name, ColumnTypeEnum $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    /**
     * Get the column name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the column name.
     *
     * @param string $name
     *
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Get the column type.
     *
     * @return ColumnTypeEnum
     */
    public function getType(): ColumnTypeEnum
    {
        return $this->type;
    }

    /**
     * Set the column type.
     *
     * @param ColumnTypeEnum $type
     *
     * @return void
     */
    public function setType(ColumnTypeEnum $type): void
    {
        $this->type = $type;
    }

    /**
     * Get the type option value.
     *
     * @return string|null
     */
    public function getTypeOption(): ?string
    {
        return $this->typeOption;
    }

    /**
     * Set the column type option.
     *
     * @param string|null $typeOption
     *
     * @return string|null
     */
    public function setTypeOption(?string $typeOption): void
    {
        $this->typeOption = $typeOption;
    }

    /**
     * Get the default value.
     *
     * @return ColumnDefaultEnum|mixed
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * Set the default value.
     *
     * @param ColumnDefaultEnum|mixed $default
     *
     * @return void
     */
    public function setDefault($default): void
    {
        $this->default = $default;
    }

    /**
     * Get the attribute.
     *
     * @return ColumnAttributeEnum|null
     */
    public function getAttribute(): ?ColumnAttributeEnum
    {
        return $this->attribute;
    }

    /**
     * Set the attribute.
     *
     * @param ColumnAttributeEnum|null $attribute
     *
     * @return void
     */
    public function setAttribute(?ColumnAttributeEnum $attribute): void
    {
        $this->attribute = $attribute;
    }

    /**
     * Whether the column is nullable.
     *
     * @return bool
     */
    public function isNullable(): bool
    {
        return $this->nullable;
    }

    /**
     * Set whether the column is nullable.
     *
     * @param bool $nullable
     *
     * @return void
     */
    public function setIsNullable(bool $nullable): void
    {
        $this->nullable = $nullable;
    }

    /**
     * Whether the column is automatically incrementing.
     *
     * @return bool
     */
    public function isAutoIncrement(): bool
    {
        return $this->autoIncrement;
    }

    /**
     * Set whether the column is automatically incrementing.
     *
     * @param bool $autoIncrement
     *
     * @return void
     */
    public function setIsAutoIncrement(bool $autoIncrement): void
    {
        $this->autoIncrement = $autoIncrement;
    }

    /**
     * Whether the value of the column must be unique.
     *
     * @return bool
     */
    public function isUnique(): bool
    {
        return $this->unique;
    }

    /**
     * Set whether the column should be unique.
     *
     * @param bool $unique
     *
     * @return void
     */
    public function setIsUnique(bool $unique): void
    {
        $this->unique = $unique;
    }

    /**
     * Get the column comment.
     *
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * Set the column comment.
     *
     * @param string $comment
     *
     * @return void
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }
}
