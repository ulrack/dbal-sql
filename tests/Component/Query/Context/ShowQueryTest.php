<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Component\Query\Context;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Component\Query\Context\ShowQuery;
use Ulrack\Dbal\Sql\Common\ShowTypeEnum;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Component\Query\Context\ShowQuery
 */
class ShowQueryTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getQuery
     *
     * @return void
     */
    public function testQuery(): void
    {
        $subject = new ShowQuery(ShowTypeEnum::DATABASES());
        $this->assertInstanceOf(ShowQuery::class, $subject);
        $this->assertEquals('SHOW DATABASES;', $subject->getQuery());
    }
}
