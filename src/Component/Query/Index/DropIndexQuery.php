<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Component\Query\Index;

use Ulrack\Dbal\Common\QueryInterface;

class DropIndexQuery implements QueryInterface
{
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
     * Constructor
     *
     * @param  string        $indexName
     * @param  string        $tableName
     */
    public function __construct(
        string $indexName,
        string $tableName
    ) {
        $this->indexName = $indexName;
        $this->tableName = $tableName;
    }

    /**
     * Builds the query and returns it.
     *
     * @return string
     */
    public function getQuery(): string
    {
        return sprintf(
            'ALTER TABLE %s DROP INDEX %s;',
            $this->tableName,
            $this->indexName
        );
    }
}
