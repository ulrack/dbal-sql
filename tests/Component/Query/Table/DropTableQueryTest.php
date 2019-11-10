<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Component\Query\Table;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Component\Query\Table\DropTableQuery;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Component\Query\Table\DropTableQuery
 */
class DropTableQueryTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getQuery
     *
     * @return void
     */
    public function testQuery(): void
    {
        $subject = new DropTableQuery('foo');
        $this->assertInstanceOf(DropTableQuery::class, $subject);

        $this->assertEquals(
            'DROP TABLE foo;',
            $subject->getQuery()
        );
    }
}
