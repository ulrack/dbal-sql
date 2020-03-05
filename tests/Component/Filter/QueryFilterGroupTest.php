<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Component\Filter;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Component\Filter\QueryFilterGroup;
use Ulrack\Dbal\Sql\Component\Filter\ComparatorFilter;
use Ulrack\Dbal\Sql\Common\ComparatorEnum;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Component\Filter\QueryFilterGroup
 */
class QueryFilterGroupTest extends TestCase
{
    /**
     * @covers ::addFilter
     * @covers ::getFilterGroup
     * @covers ::getParameters
     *
     * @return void
     */
    public function testFilter(): void
    {
        $subject = new QueryFilterGroup;
        $subject->addFilter(
            new ComparatorFilter('foo', 'bar', ComparatorEnum::EQ())
        );

        $this->assertEquals('foo = ?', $subject->getFilterGroup());
        $this->assertEquals(['bar'], $subject->getParameters());
    }

    /**
     * @covers ::getFilterGroup
     * @covers ::getParameters
     *
     * @return void
     */
    public function testNoFiltersInGroup(): void
    {
        $subject = new QueryFilterGroup;
        $this->assertEquals('', $subject->getFilterGroup());
        $this->assertEquals([], $subject->getParameters());
    }
}
