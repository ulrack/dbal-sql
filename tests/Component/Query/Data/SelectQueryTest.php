<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Component\Query\Data;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Component\Query\Data\SelectQuery;
use Ulrack\Dbal\Common\Enum\SortDirectionEnum;
use Ulrack\Dbal\Sql\Component\Filter\QueryFilterGroup;
use Ulrack\Dbal\Sql\Component\Filter\ComparatorFilter;
use Ulrack\Dbal\Sql\Common\ComparatorEnum;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Component\Query\Data\SelectQuery
 * @covers \Ulrack\Dbal\Sql\Component\SortableQueryTrait
 */
class SelectQueryTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getQuery
     * @covers ::getParameters
     * @covers ::addColumn
     * @covers ::addGroupBy
     * @covers ::setDistinct
     * @covers \Ulrack\Dbal\Sql\Component\SortableQueryTrait::addSorter()
     * @covers \Ulrack\Dbal\Sql\Component\SortableQueryTrait::getSort()
     *
     * @return void
     */
    public function testQuery(): void
    {
        $subject = new SelectQuery('foo');

        $this->assertInstanceOf(SelectQuery::class, $subject);
        $subject->setDistinct(true);
        $subject->addGroupBy('bar');

        $filterGroup = new QueryFilterGroup;
        $filterGroup->addFilter(
            new ComparatorFilter('bar', 'baz', ComparatorEnum::EQ())
        );

        $subject->addFilterGroup($filterGroup);

        $subject->addColumn('baz');
        $subject->addColumn('foo', 'bar');
        $subject->addColumn('foo', 'count', 'COUNT');

        $subject->addSorter('foo', SortDirectionEnum::DIRECTION_ASC());

        $this->assertEquals(
            'SELECT DISTINCT baz, foo AS bar, COUNT(foo) AS count FROM foo WHERE'.
            ' (bar = ?) GROUP BY bar ORDER BY foo ASC;',
            $subject->getQuery()
        );

        $this->assertEquals(['baz'], $subject->getParameters());
    }

    /**
     * @covers ::__construct
     * @covers ::getQuery
     * @covers ::getParameters
     * @covers \Ulrack\Dbal\Sql\Component\SortableQueryTrait::getSort()
     *
     * @return void
     */
    public function testFullSelect(): void
    {
        $subject = new SelectQuery('foo');

        $this->assertEquals(
            'SELECT * FROM foo;',
            $subject->getQuery()
        );

        $this->assertEquals([], $subject->getParameters());
    }
}
