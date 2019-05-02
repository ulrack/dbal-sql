<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Query\Database;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Query\Database\DropDatabaseQuery;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Query\Database\DropDatabaseQuery
 */
class DropDatabaseQueryTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getQuery
     *
     * @return void
     */
    public function testQuery(): void
    {
        $subject = new DropDatabaseQuery('foo');
        $this->assertInstanceOf(DropDatabaseQuery::class, $subject);

        $this->assertEquals(
            'DROP DATABASE foo;',
            $subject->getQuery()
        );
    }
}
