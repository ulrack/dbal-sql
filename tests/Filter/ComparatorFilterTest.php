<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Filter;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Filter\ComparatorFilter;
use Ulrack\Dbal\Sql\Common\ComparatorEnum;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Filter\ComparatorFilter
 */
class ComparatorFilterTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getFilter
     * @covers ::getParameters
     *
     * @return void
     */
    public function testFilter(): void
    {
        $subject = new ComparatorFilter(
            'foo',
            ['bar'],
            ComparatorEnum::COMPARATOR_EQ()
        );

        $this->assertInstanceOf(ComparatorFilter::class, $subject);

        $this->assertEquals('foo = ?', $subject->getFilter());
        $this->assertEquals(['bar'], $subject->getParameters());
    }

    /**
     * @covers ::__construct
     * @covers ::getFilter
     * @covers ::getParameters
     *
     * @return void
     */
    public function testScalarValue(): void
    {
        $subject = new ComparatorFilter(
            'foo',
            'bar',
            ComparatorEnum::COMPARATOR_EQ()
        );

        $this->assertEquals('foo = ?', $subject->getFilter());
        $this->assertEquals(['bar'], $subject->getParameters());
    }

    /**
     * @covers ::__construct
     * @covers ::getFilter
     * @covers ::getParameters
     *
     * @return void
     */
    public function testIsNullComparator(): void
    {
        $subject = new ComparatorFilter(
            'foo',
            '',
            ComparatorEnum::COMPARATOR_IS_NULL()
        );

        $this->assertEquals('foo IS NULL', $subject->getFilter());
        $this->assertEquals([], $subject->getParameters());
    }
}
