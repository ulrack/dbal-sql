<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Query\Table;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Query\Table\CreateTableQuery;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Query\Table\CreateTableQuery
 */
class CreateTableQueryTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getQuery
     *
     * @return void
     */
    public function testQuery(): void
    {
        $subject = new CreateTableQuery('foo', 'INNODB');
        $this->assertInstanceOf(CreateTableQuery::class, $subject);

        $this->assertEquals(
            'CREATE TABLE foo () ENGINE = INNODB;',
            $subject->getQuery()
        );
    }
}
