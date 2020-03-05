<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Component\Query\Database;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Component\Query\Database\BackupDatabaseQuery;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Component\Query\Database\BackupDatabaseQuery
 */
class BackupDatabaseQueryTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getQuery
     *
     * @return void
     */
    public function testQuery(): void
    {
        $subject = new BackupDatabaseQuery('foo', true, 'bar.sql');
        $this->assertInstanceOf(BackupDatabaseQuery::class, $subject);

        $this->assertEquals(
            'BACKUP DATABASE foo TO DISK = bar.sql WITH DIFFERENTIAL;',
            $subject->getQuery()
        );
    }
}
