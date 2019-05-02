<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Query;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Query\RawQuery;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Query\RawQuery
 */
class RawQueryTest extends TestCase
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
        $subject = new RawQuery('USE foo;', ['foo']);
        $this->assertInstanceOf(RawQuery::class, $subject);
        $this->assertEquals('USE foo;', $subject->getQuery());
        $this->assertEquals(['foo'], $subject->getParameters());
    }
}
