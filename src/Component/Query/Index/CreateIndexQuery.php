<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Component\Query\Index;

use Ulrack\Dbal\Common\QueryInterface;
use Ulrack\Dbal\Sql\Common\IndexTypeEnum;

class CreateIndexQuery implements QueryInterface
{
    /**
     * Contains the type of the index.
     *
     * @var IndexTypeEnum
     */
    private $type;

    /**
     * Contains the name of the index.
     *
     * @var string
     */
    private $indexName;

    /**
     * Contains the name of the table on which the index is applied.
     *
     * @var string
     */
    private $tableName;

    /**
     * Contains the list of columns on which the index is applied.
     *
     * @var string[]
     */
    private $columns;

    /**
     * Constructor
     *
     * @param  IndexTypeEnum $type
     * @param  string        $indexName
     * @param  string        $tableName
     * @param  string        ...$columns
     */
    public function __construct(
        IndexTypeEnum $type,
        string $indexName,
        string $tableName,
        string ...$columns
    ) {
        $this->type      = $type;
        $this->indexName = $indexName;
        $this->tableName = $tableName;
        $this->columns   = $columns;
    }

    /**
     * Builds the query and returns it.
     *
     * @return string
     */
    public function getQuery(): string
    {
        return sprintf(
            'CREATE %s %s ON %s (%s);',
            $this->type,
            $this->indexName,
            $this->tableName,
            implode(', ', $this->columns)
        );
    }
}
