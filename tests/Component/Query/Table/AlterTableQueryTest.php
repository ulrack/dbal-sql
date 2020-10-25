<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Component\Query\Table;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Common\ColumnTypeEnum;
use Ulrack\Dbal\Sql\Common\ColumnDefaultEnum;
use Ulrack\Dbal\Sql\Component\Query\Table\AlterTableQuery;
use Ulrack\Dbal\Sql\Component\Query\Table\ColumnDefinition;

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
        $subject->addForeignKey('FK_foo', 'foo', 'qux', 'foo', null, null);
        $subject->dropForeignKey('FK_bar');
        $column = new ColumnDefinition(
            'qux',
            ColumnTypeEnum::VARCHAR()
        );
        $column->setTypeOption('255');
        $column->setDefault(ColumnDefaultEnum::DEFAULT_NULL());
        $column->setIsNullable(true);
        $column->setComment('Lorem Ipsum dolor sit amet');
        $subject->addColumn($column);

        $alterColumn = new ColumnDefinition('doe', ColumnTypeEnum::INT());
        $alterColumn->setTypeOption('11');
        $alterColumn->setDefault(1);

        $subject->alterColumn($alterColumn);

        $subject->dropColumn('foo');

        $this->assertEquals(
            'ALTER TABLE foo ADD `qux` VARCHAR(255) NULL DEFAULT NULL ' .
            'COMMENT \'Lorem Ipsum dolor sit amet\', DROP COLUMN `foo`, MODIFY' .
            ' `doe` INT(11) NOT NULL DEFAULT 1, ADD CONSTRAINT PRIMARY KEY(`bar`)' .
            ', ADD CONSTRAINT FK_foo FOREIGN KEY(foo) REFERENCES qux(foo), DROP ' .
            'PRIMARY KEY, DROP FOREIGN KEY FK_bar;',
            $subject->getQuery()
        );
    }
}
