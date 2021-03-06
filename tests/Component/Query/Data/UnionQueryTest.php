<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Component\Query\Data;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Component\Query\Data\UnionQuery;
use Ulrack\Dbal\Sql\Component\Query\Data\SelectQuery;
use Ulrack\Dbal\Sql\Common\UnionEnum;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Component\Query\Data\UnionQuery
 */
class UnionQueryTest extends TestCase
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
        $subject = new UnionQuery(
            new SelectQuery('foo'),
            new SelectQuery('bar'),
            UnionEnum::ALL()
        );

        $this->assertInstanceOf(UnionQuery::class, $subject);

        $this->assertEquals(
            'SELECT * FROM foo UNION ALL SELECT * FROM bar;',
            $subject->getQuery()
        );

        $this->assertEquals([], $subject->getParameters());
    }
}
