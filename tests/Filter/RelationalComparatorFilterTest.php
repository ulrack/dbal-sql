<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Filter;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Filter\RelationalComparatorFilter;
use Ulrack\Dbal\Sql\Common\ComparatorEnum;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Filter\RelationalComparatorFilter
 */
class RelationalComparatorFilterTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getFilter
     *
     * @return void
     */
    public function testFilter(): void
    {
        $subject = new RelationalComparatorFilter(
            'foo',
            ['bar', 'baz', 'qux'],
            ComparatorEnum::COMPARATOR_IN()
        );

        $this->assertInstanceOf(RelationalComparatorFilter::class, $subject);

        $this->assertEquals('foo IN (bar, baz, qux)', $subject->getFilter());
    }
}
