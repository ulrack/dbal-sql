<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Query\Database;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Query\Database\AlterDatabaseQuery;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Query\Database\AlterDatabaseQuery
 */
class AlterDatabaseQueryTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getQuery
     *
     * @return void
     */
    public function testQuery(): void
    {
        $subject = new AlterDatabaseQuery(
            'foo',
            'utf8mb4',
            'utf8mb4_unicode_ci'
        );
        $this->assertInstanceOf(AlterDatabaseQuery::class, $subject);

        $this->assertEquals(
            'ALTER DATABASE foo CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;',
            $subject->getQuery()
        );
    }
}
