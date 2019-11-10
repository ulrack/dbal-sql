<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Component\Query\Table;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Component\Query\Table\AlterTableQuery;
use Ulrack\Dbal\Sql\Common\IndexTypeEnum;
use Ulrack\Dbal\Sql\Common\ColumnTypeEnum;
use Ulrack\Dbal\Sql\Common\ColumnDefaultEnum;
use Ulrack\Dbal\Sql\Common\ColumnAttributeEnum;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Component\Query\Table\AlterTableQuery
 * @covers \Ulrack\Dbal\Sql\Component\Query\Table\AbstractTableQuery
 */
class AlterTableQueryTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getQuery
     * @covers \Ulrack\Dbal\Sql\Component\Query\Table\AbstractTableQuery::addPrimaryKey
     * @covers \Ulrack\Dbal\Sql\Component\Query\Table\AbstractTableQuery::dropPrimaryKey
     * @covers \Ulrack\Dbal\Sql\Component\Query\Table\AbstractTableQuery::addForeignKey
     * @covers \Ulrack\Dbal\Sql\Component\Query\Table\AbstractTableQuery::dropForeignKey
     * @covers \Ulrack\Dbal\Sql\Component\Query\Table\AbstractTableQuery::getKeys
     * @covers \Ulrack\Dbal\Sql\Component\Query\Table\AbstractTableQuery::addColumn
     * @covers \Ulrack\Dbal\Sql\Component\Query\Table\AbstractTableQuery::alterColumn
     * @covers \Ulrack\Dbal\Sql\Component\Query\Table\AbstractTableQuery::dropColumn
     * @covers \Ulrack\Dbal\Sql\Component\Query\Table\AbstractTableQuery::getColumns
     *
     * @return void
     */
    public function testQuery(): void
    {
        $subject = new AlterTableQuery('foo');
        $this->assertInstanceOf(AlterTableQuery::class, $subject);

        $subject->addPrimaryKey('bar');
        $subject->dropPrimaryKey();
        $subject->addForeignKey('FK_foo', 'foo', 'qux', 'foo');
        $subject->dropForeignKey('FK_bar');
        $subject->addColumn(
            'qux',
            ColumnTypeEnum::VARCHAR(),
            '255',
            ColumnDefaultEnum::DEFAULT_NULL(),
            null,
            true,
            false,
            false,
            'Lorem Ipsum dolor sit amet'
        );

        $subject->alterColumn('doe', ColumnTypeEnum::INT(), '11');
        $subject->dropColumn('foo');

        $this->assertEquals(
            'ALTER TABLE foo ADD `qux` VARCHAR(255) NULL DEFAULT \'NULL\' '.
            'COMMENT \'Lorem Ipsum dolor sit amet\', DROP COLUMN `foo`, MODIFY'.
            ' `doe` INT(11) NULL, ADD CONSTRAINT PRIMARY KEY(`bar`), ADD '.
            'CONSTRAINT FK_foo FOREIGN KEY(foo) REFERENCES qux(foo), DROP '.
            'PRIMARY KEY, DROP FOREIGN KEY FK_bar;',
            $subject->getQuery()
        );
    }
}
