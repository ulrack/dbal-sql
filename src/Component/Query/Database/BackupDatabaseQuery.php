<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Component\Query\Database;

use Ulrack\Dbal\Common\QueryInterface;

class BackupDatabaseQuery implements QueryInterface
{
    /**
     * The database which is being backed up.
     *
     * @var string
     */
    private $database;

    /**
     * Determines if the output of the backup should only contain changes.
     *
     * @var bool
     */
    private $withDifferential;

    /**
     * Contains the file(s) which the backup needs to be written to.
     *
     * @var string[]
     */
    private $files;

    /**
     * Constructor
     *
     * @param string  $database
     * @param boolean $withDifferential
     * @param string  ...$files
     */
    public function __construct(
        string $database,
        bool $withDifferential,
        string ...$files
    ) {
        $this->database         = $database;
        $this->withDifferential = $withDifferential;
        $this->files            = $files;
    }

    /**
     * Builds the query and returns it.
     *
     * @return string
     */
    public function getQuery(): string
    {
        return sprintf(
            'BACKUP DATABASE %s TO %s%s;',
            $this->database,
            implode(', ', array_map(function ($value) {
                return sprintf('DISK = %s', $value);
            }, $this->files)),
            $this->withDifferential ? ' WITH DIFFERENTIAL' : ''
        );
    }
}
