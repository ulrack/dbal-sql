<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Query\Table;

use Ulrack\Dbal\Common\QueryInterface;

class AlterTableQuery extends AbstractTableQuery
{
    /**
     * The table which is being altered.
     *
     * @var string
     */
    private $table;

    /**
     * The engine that is being used for the table.
     *
     * @var null|string
     */
    private $engine;

    /**
     * Constructor
     *
     * @param string      $table
     * @param string|null $engine
     */
    public function __construct(string $table, string $engine = null)
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
            'ALTER TABLE %s (%s)%s;',
            $this->table,
            implode(
                ', ',
                array_merge(
                    ...array_values($this->getColumns()),
                    ...array_values($this->getIndices())
                )
            ),
            $this->engine ? sprintf(' ENGINE = %s', $this->engine) : ''
        );
    }
}
