<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Component\Filter;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Component\Filter\ExistsFilter;
use Ulrack\Dbal\Sql\Component\Query\Data\SelectQuery;
use Ulrack\Dbal\Common\QueryInterface;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Component\Filter\ExistsFilter
 */
class ExistsFilterTest extends TestCase
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
        $subject = new ExistsFilter(new SelectQuery('foo'));

        $this->assertInstanceOf(ExistsFilter::class, $subject);

        $this->assertEquals(
            'EXISTS (SELECT * FROM foo)',
            $subject->getFilter()
        );

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

        $subject = new ExistsFilter($queryMock);

        $this->assertInstanceOf(ExistsFilter::class, $subject);

        $this->assertEquals(
            'EXISTS (SELECT * FROM foo)',
            $subject->getFilter()
        );

        $this->assertEquals([], $subject->getParameters());
    }
}
