<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Query\Data;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Query\Data\DeleteQuery;
use Ulrack\Dbal\Sql\Filter\QueryFilterGroup;
use Ulrack\Dbal\Sql\Filter\ComparatorFilter;
use Ulrack\Dbal\Sql\Common\ComparatorEnum;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Query\Data\DeleteQuery
 * @covers \Ulrack\Dbal\Sql\Component\FilterableQueryTrait
 * @covers \Ulrack\Dbal\Sql\Component\PageableQueryTrait
 */
class DeleteQueryTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getQuery
     * @covers ::getParameters
     * @covers \Ulrack\Dbal\Sql\Component\FilterableQueryTrait::addFilterGroup
     * @covers \Ulrack\Dbal\Sql\Component\FilterableQueryTrait::getFilter
     * @covers \Ulrack\Dbal\Sql\Component\FilterableQueryTrait::getFilterParameters
     * @covers \Ulrack\Dbal\Sql\Component\PageableQueryTrait::getPage
     *
     * @return void
     */
    public function testQuery(): void
    {
        $subject = new DeleteQuery('foo');
        $filterGroup = new QueryFilterGroup;
        $filterGroup->addFilter(
            new ComparatorFilter('bar', 'baz', ComparatorEnum::COMPARATOR_EQ())
        );

        $subject->addFilterGroup($filterGroup);

        $this->assertEquals(
            'DELETE FROM foo WHERE (bar = ?);',
            $subject->getQuery()
        );

        $this->assertEquals(['baz'], $subject->getParameters());
    }

    /**
     * @covers ::__construct
     * @covers ::getQuery
     * @covers ::getParameters
     * @covers \Ulrack\Dbal\Sql\Component\FilterableQueryTrait::getFilter
     * @covers \Ulrack\Dbal\Sql\Component\FilterableQueryTrait::getFilterParameters
     * @covers \Ulrack\Dbal\Sql\Component\PageableQueryTrait::setPage
     * @covers \Ulrack\Dbal\Sql\Component\PageableQueryTrait::getPage
     *
     * @return void
     */
    public function testQueryPaged(): void
    {
        $subject = new DeleteQuery('foo');
        $subject->setPage(10, 4);
        $this->assertEquals(
            'DELETE FROM foo LIMIT 10 OFFSET 30;',
            $subject->getQuery()
        );

        $this->assertEquals([], $subject->getParameters());
    }
}
