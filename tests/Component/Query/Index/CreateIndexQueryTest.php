<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Component\Query\Index;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Component\Query\Index\CreateIndexQuery;
use Ulrack\Dbal\Sql\Common\IndexTypeEnum;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Component\Query\Index\CreateIndexQuery
 */
class CreateIndexQueryTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getQuery
     *
     * @return void
     */
    public function testQuery(): void
    {
        $subject = new CreateIndexQuery(
            IndexTypeEnum::UNIQUE(),
            'IDX_foo',
            'bar',
            'baz'
        );

        $this->assertInstanceOf(CreateIndexQuery::class, $subject);

        $this->assertEquals(
            'CREATE UNIQUE INDEX IDX_foo ON bar (baz);',
            $subject->getQuery()
        );
    }
}
