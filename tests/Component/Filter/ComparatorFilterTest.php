<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Component\Filter;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Component\Filter\ComparatorFilter;
use Ulrack\Dbal\Sql\Common\ComparatorEnum;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Component\Filter\ComparatorFilter
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
            ComparatorEnum::EQ()
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
            ComparatorEnum::EQ()
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
            ComparatorEnum::IS_NULL()
        );

        $this->assertEquals('foo IS NULL', $subject->getFilter());
        $this->assertEquals([], $subject->getParameters());
    }
}
