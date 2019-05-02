<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Filter;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Filter\QueryInFilter;
use Ulrack\Dbal\Sql\Query\Data\SelectQuery;
use Ulrack\Dbal\Common\QueryInterface;
use Ulrack\Dbal\Sql\Common\ComparatorEnum;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Filter\QueryInFilter
 */
class QueryInFilterTest extends TestCase
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
        $subject = new QueryInFilter(
            'baz',
            new SelectQuery('foo'),
            ComparatorEnum::IN()
        );

        $this->assertInstanceOf(QueryInFilter::class, $subject);

        $this->assertEquals('baz IN (SELECT * FROM foo )', $subject->getFilter());
        $this->assertEquals([], $subject->getParameters());
    }

    /**
     * @covers ::__construct
     * @covers ::getFilter
     * @covers ::getParameters
     *
     * @return void
     */
    public function testFilterNonParameterizedQuery(): void
    {
        $queryMock = $this->createMock(QueryInterface::class);
        $queryMock->expects(static::once())
            ->method('getQuery')
            ->willReturn('SELECT * FROM foo');

        $subject = new QueryInFilter(
            'baz',
            $queryMock,
            ComparatorEnum::IN()
        );

        $this->assertInstanceOf(QueryInFilter::class, $subject);

        $this->assertEquals('baz IN (SELECT * FROM foo)', $subject->getFilter());
        $this->assertEquals([], $subject->getParameters());
    }
}
