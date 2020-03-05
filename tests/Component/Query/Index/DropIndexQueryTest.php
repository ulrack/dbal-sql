<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Component\Query\Index;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Component\Query\Index\DropIndexQuery;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Component\Query\Index\DropIndexQuery
 */
class DropIndexQueryTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getQuery
     *
     * @return void
     */
    public function testQuery(): void
    {
        $subject = new DropIndexQuery('IDX_foo', 'bar');

        $this->assertInstanceOf(DropIndexQuery::class, $subject);

        $this->assertEquals(
            'ALTER TABLE bar DROP INDEX IDX_foo;',
            $subject->getQuery()
        );
    }
}
