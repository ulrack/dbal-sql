<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Query\Data;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Query\Data\SelectIntoQuery;
use Ulrack\Dbal\Common\Enum\JoinTypeEnum;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Query\Data\SelectIntoQuery
 * @covers \Ulrack\Dbal\Sql\Component\JoinableQueryTrait
 */
class SelectIntoQueryTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getQuery
     * @covers ::getParameters
     * @covers ::addColumn
     * @covers \Ulrack\Dbal\Sql\Component\JoinableQueryTrait::addJoin()
     * @covers \Ulrack\Dbal\Sql\Component\JoinableQueryTrait::getJoin()
     *
     * @return void
     */
    public function testQuery(): void
    {
        $subject = new SelectIntoQuery(
            'foo',
            'bar',
            ''
        );

        $this->assertInstanceOf(SelectIntoQuery::class, $subject);

        $subject->addColumn('baz');
        $subject->addColumn('foo', 'bar');
        $subject->addColumn('foo', 'count', 'COUNT');
        $subject->addJoin(
            'baz',
            'foo.bar',
            'baz.qux',
            JoinTypeEnum::JOIN_INNER()
        );

        $this->assertEquals(
            'SELECT baz, foo AS bar, COUNT(foo) AS count INTO bar FROM foo INNER JOIN baz ON foo.bar = baz.qux;',
            $subject->getQuery()
        );
        $this->assertEquals([], $subject->getParameters());
    }

    /**
     * @covers ::__construct
     * @covers ::getQuery
     * @covers ::getParameters
     * @covers ::addColumn
     * @covers \Ulrack\Dbal\Sql\Component\JoinableQueryTrait::getJoin()
     *
     * @return void
     */
    public function testQueryExternalDatabase(): void
    {
        $subject = new SelectIntoQuery(
            'foo',
            'bar',
            'baz'
        );

        $this->assertInstanceOf(SelectIntoQuery::class, $subject);

        $subject->addColumn('baz');
        $subject->addColumn('foo', 'bar');
        $subject->addColumn('foo', 'count', 'COUNT');

        $this->assertEquals(
            'SELECT baz, foo AS bar, COUNT(foo) AS count INTO bar IN baz FROM foo ;',
            $subject->getQuery()
        );

        $this->assertEquals([], $subject->getParameters());
    }
}
