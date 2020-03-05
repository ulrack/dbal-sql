<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Component\Query;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Component\Query\BatchQuery;
use Ulrack\Dbal\Sql\Component\Query\RawQuery;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Component\Query\BatchQuery
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
