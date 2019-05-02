<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Filter;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Filter\QueryOperatorFilter;
use Ulrack\Dbal\Sql\Query\Data\SelectQuery;
use Ulrack\Dbal\Common\QueryInterface;
use Ulrack\Dbal\Sql\Common\ComparatorEnum;
use Ulrack\Dbal\Sql\Common\OperatorEnum;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Filter\QueryOperatorFilter
 */
class QueryOperatorFilterTest extends TestCase
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
        $subject = new QueryOperatorFilter(
            'foo',
            new SelectQuery('bar'),
            ComparatorEnum::COMPARATOR_EQ(),
            OperatorEnum::OPERATOR_ALL()
        );

        $this->assertInstanceOf(QueryOperatorFilter::class, $subject);

        $this->assertEquals('foo = ALL (SELECT * FROM bar )', $subject->getFilter());
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
            ->willReturn('SELECT * FROM bar');

        $subject = new QueryOperatorFilter(
            'foo',
            $queryMock,
            ComparatorEnum::COMPARATOR_EQ(),
            OperatorEnum::OPERATOR_ALL()
        );

        $this->assertInstanceOf(QueryOperatorFilter::class, $subject);

        $this->assertEquals('foo = ALL (SELECT * FROM bar)', $subject->getFilter());
        $this->assertEquals([], $subject->getParameters());
    }
}
