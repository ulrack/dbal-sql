<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Component\Query\Table;

use Ulrack\Dbal\Common\QueryInterface;

class CreateTableQuery extends AbstractTableQuery
{
    /**
     * The table which is being created.
     *
     * @var string
     */
    private $table;

    /**
     * Contains the engine that is used for the table.
     *
     * @var string
     */
    private $engine;

    /**
     * Constructor
     *
     * @param string $table
     */
    public function __construct(string $table, string $engine = 'INNODB')
    {
        $this->table  = $table;
        $this->engine = $engine;
    }

    /**
     * Builds the query and returns it.
     *
     * @return string
     */
    public function getQuery(): string
    {
        return sprintf(
            'CREATE TABLE %s (%s) ENGINE = %s;',
            $this->table,
            implode(
                ', ',
                array_merge(
                    $this->getColumns()['add'],
                    $this->getKeys()['add']
                )
            ),
            $this->engine
        );
    }
}
