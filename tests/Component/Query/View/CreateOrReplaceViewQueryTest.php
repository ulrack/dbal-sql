<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Component\Query\View;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Component\Query\View\CreateOrReplaceViewQuery;
use Ulrack\Dbal\Sql\Component\Query\Data\SelectQuery;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Component\Query\View\CreateOrReplaceViewQuery
 */
class CreateOrReplaceViewQueryTest extends TestCase
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
        $subject = new CreateOrReplaceViewQuery('foo', new SelectQuery('foo'));
        $this->assertInstanceOf(CreateOrReplaceViewQuery::class, $subject);

        $this->assertEquals(
            'CREATE VIEW OR REPLACE foo AS SELECT * FROM foo;',
            $subject->getQuery()
        );

        $this->assertEquals([], $subject->getParameters());
    }
}
