<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Query;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Query\BatchQuery;
use Ulrack\Dbal\Sql\Query\RawQuery;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Query\BatchQuery
 */
class BatchQueryTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getQuery
     * @covers ::getParameters
     *
     * @return void
     */
    public function testQuery(): void
    {
        $queryOne = new RawQuery('USE foo;', ['foo']);
        $queryTwo = new RawQuery('USE bar;', ['bar']);
        $subject = new BatchQuery($queryOne, $queryTwo);
        $this->assertInstanceOf(BatchQuery::class, $subject);
        $this->assertEquals('USE foo;USE bar;', $subject->getQuery());
        $this->assertEquals(['foo', 'bar'], $subject->getParameters());
    }
}
