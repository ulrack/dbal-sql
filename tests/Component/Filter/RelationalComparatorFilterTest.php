<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Component\Filter;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Component\Filter\RelationalComparatorFilter;
use Ulrack\Dbal\Sql\Common\ComparatorEnum;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Component\Filter\RelationalComparatorFilter
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
            ComparatorEnum::IN()
        );

        $this->assertInstanceOf(RelationalComparatorFilter::class, $subject);

        $this->assertEquals('foo IN (bar, baz, qux)', $subject->getFilter());
    }
}
