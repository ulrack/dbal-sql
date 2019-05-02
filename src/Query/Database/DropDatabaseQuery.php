<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Query\Database;

use Ulrack\Dbal\Common\QueryInterface;

class DropDatabaseQuery implements QueryInterface
{
    /**
     * The database which is being dropped.
     *
     * @var string
     */
    private $database;

    /**
     * Constructor
     *
     * @param string $database
     */
    public function __construct(string $database)
    {
        $this->database = $database;
    }

    /**
     * Builds the query and returns it.
     *
     * @return string
     */
    public function getQuery(): string
    {
        return sprintf(
            'DROP DATABASE %s;',
            $this->database
        );
    }
}
