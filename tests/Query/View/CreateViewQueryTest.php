<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Query\View;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Query\View\CreateViewQuery;
use Ulrack\Dbal\Sql\Query\Data\SelectQuery;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Query\View\CreateViewQuery
 */
class CreateViewQueryTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getQuery
     * @covers ::getParameters
     *
     * @return void
     */
    public function testQuery(): void
    {
        $subject = new CreateViewQuery('foo', new SelectQuery('foo'));
        $this->assertInstanceOf(CreateViewQuery::class, $subject);

        $this->assertEquals(
            'CREATE VIEW foo AS SELECT * FROM foo ;',
            $subject->getQuery()
        );

        $this->assertEquals([], $subject->getParameters());
    }
}
