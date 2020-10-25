<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Component\Query\View;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Component\Query\View\DropViewQuery;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Component\Query\View\DropViewQuery
 */
class DropViewQueryTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getQuery
     *
     * @return void
     */
    public function testQuery(): void
    {
        $subject = new DropViewQuery('foo');
        $this->assertInstanceOf(DropViewQuery::class, $subject);

        $this->assertEquals(
            'DROP VIEW foo;',
            $subject->getQuery()
        );
    }
}
