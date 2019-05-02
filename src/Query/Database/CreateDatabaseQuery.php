<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Query\Database;

use Ulrack\Dbal\Common\QueryInterface;

class CreateDatabaseQuery implements QueryInterface
{
    /**
     * The database which is being created.
     *
     * @var string
     */
    private $database;

    /**
     * Contains the charset which is used to create the database.
     *
     * @var string
     */
    private $charset;

    /**
     * Contains the collation which is used to create the database.
     *
     * @var string
     */
    private $collate;

    /**
     * Constructor
     *
     * @param string $database
     * @param string $charset
     * @param string $collate
     */
    public function __construct(
        string $database,
        string $charset = 'utf8mb4',
        string $collate = 'utf8mb4_unicode_ci'
    ) {
        $this->database = $database;
        $this->charset  = $charset;
        $this->collate  = $collate;
    }

    /**
     * Builds the query and returns it.
     *
     * @return string
     */
    public function getQuery(): string
    {
        return sprintf(
            'CREATE DATABASE IF NOT EXISTS %s CHARACTER SET %s COLLATE %s;',
            $this->database,
            $this->charset,
            $this->collate
        );
    }
}
