<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Tests\Query\Table;

use PHPUnit\Framework\TestCase;
use Ulrack\Dbal\Sql\Query\Table\AlterTableQuery;
use Ulrack\Dbal\Sql\Common\IndexTypeEnum;
use Ulrack\Dbal\Sql\Common\ColumnTypeEnum;
use Ulrack\Dbal\Sql\Common\ColumnDefaultEnum;
use Ulrack\Dbal\Sql\Common\ColumnAttributeEnum;

/**
 * @coversDefaultClass \Ulrack\Dbal\Sql\Query\Table\AlterTableQuery
 * @covers \Ulrack\Dbal\Sql\Query\Table\AbstractTableQuery
 */
class AlterTableQueryTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getQuery
     * @covers \Ulrack\Dbal\Sql\Query\Table\AbstractTableQuery::addIndex
     * @covers \Ulrack\Dbal\Sql\Query\Table\AbstractTableQuery::dropIndex
     * @covers \Ulrack\Dbal\Sql\Query\Table\AbstractTableQuery::getIndices
     * @covers \Ulrack\Dbal\Sql\Query\Table\AbstractTableQuery::addColumn
     * @covers \Ulrack\Dbal\Sql\Query\Table\AbstractTableQuery::alterColumn
     * @covers \Ulrack\Dbal\Sql\Query\Table\AbstractTableQuery::dropColumn
     * @covers \Ulrack\Dbal\Sql\Query\Table\AbstractTableQuery::getColumns
     *
     * @return void
     */
    public function testQuery(): void
    {
        $subject = new AlterTableQuery('foo', 'INNODB');
        $this->assertInstanceOf(AlterTableQuery::class, $subject);

        $subject->addIndex(IndexTypeEnum::INDEX_PRIMARY(), 'bar');
        $subject->dropIndex('baz');
        $subject->addColumn(
            'qux',
            ColumnTypeEnum::TYPE_VARCHAR(),
            '255',
            ColumnDefaultEnum::DEFAULT_NULL(),
            ColumnAttributeEnum::ATTRIBUTE_UNSIGNED(),
            true,
            false,
            'Lorem Ipsum dolor sit amet'
        );

        $subject->alterColumn('doe', ColumnTypeEnum::TYPE_TINYINT(), '11');
        $subject->dropColumn('foo');

        $this->assertEquals(
            'ALTER TABLE foo (`qux` VARCHAR(255) UNSIGNED  NULL COMMENT \'Lorem'.
            ' Ipsum dolor sit amet\', `foo`, `` TINYINT(11) NULL DEFAULT \'\', '.
            'PRIMARY(`bar`), `baz`) ENGINE = INNODB;',
            $subject->getQuery()
        );
    }
}
