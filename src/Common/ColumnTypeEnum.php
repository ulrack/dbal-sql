<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Common;

use Ulrack\Enum\Enum;

/**
 * @method static ColumnTypeEnum TYPE_TINYINT()
 * @method static ColumnTypeEnum TYPE_SMALLINT()
 * @method static ColumnTypeEnum TYPE_MEDIUMINT()
 * @method static ColumnTypeEnum TYPE_INT()
 * @method static ColumnTypeEnum TYPE_BIGINT()
 * @method static ColumnTypeEnum TYPE_DECIMAL()
 * @method static ColumnTypeEnum TYPE_FLOAT()
 * @method static ColumnTypeEnum TYPE_DOUBLE()
 * @method static ColumnTypeEnum TYPE_BIT()
 * @method static ColumnTypeEnum TYPE_BOOLEAN()
 * @method static ColumnTypeEnum TYPE_DATE()
 * @method static ColumnTypeEnum TYPE_DATETIME()
 * @method static ColumnTypeEnum TYPE_TIMESTAMP()
 * @method static ColumnTypeEnum TYPE_TIME()
 * @method static ColumnTypeEnum TYPE_YEAR()
 * @method static ColumnTypeEnum TYPE_CHAR()
 * @method static ColumnTypeEnum TYPE_VARCHAR()
 * @method static ColumnTypeEnum TYPE_TINYTEXT()
 * @method static ColumnTypeEnum TYPE_MEDIUMTEXT()
 * @method static ColumnTypeEnum TYPE_LONGTEXT()
 * @method static ColumnTypeEnum TYPE_BINARY()
 * @method static ColumnTypeEnum TYPE_VARBINARY()
 * @method static ColumnTypeEnum TYPE_TINYBLOB()
 * @method static ColumnTypeEnum TYPE_MEDIUMBLOB()
 * @method static ColumnTypeEnum TYPE_BLOB()
 * @method static ColumnTypeEnum TYPE_LONGBLOB()
 * @method static ColumnTypeEnum TYPE_ENUM()
 * @method static ColumnTypeEnum TYPE_SET()
 * @method static ColumnTypeEnum TYPE_GEOMETRY()
 * @method static ColumnTypeEnum TYPE_POINT()
 * @method static ColumnTypeEnum TYPE_LINESTRING()
 * @method static ColumnTypeEnum TYPE_POLYGON()
 * @method static ColumnTypeEnum TYPE_MULTIPOINT()
 * @method static ColumnTypeEnum TYPE_MULTILINESTRING()
 * @method static ColumnTypeEnum TYPE_MULTIPOLYGON()
 * @method static ColumnTypeEnum TYPE_GEOMETRYCOLLECTION()
 * @method static ColumnTypeEnum TYPE_JSON()
 */

class ColumnTypeEnum extends Enum
{
    /**
     * Numeric types
     */
    const TYPE_TINYINT = 'TINYINT';
    const TYPE_SMALLINT = 'SMALLINT';
    const TYPE_MEDIUMINT = 'MEDIUMINT';
    const TYPE_INT = 'INT';
    const TYPE_BIGINT = 'BIGINT';
    const TYPE_DECIMAL = 'DECIMAL';
    const TYPE_FLOAT = 'FLOAT';
    const TYPE_DOUBLE = 'DOUBLE';
    const TYPE_BIT = 'BIT';
    const TYPE_BOOLEAN = 'BOOLEAN';

    /**
     * Date types
     */
    const TYPE_DATE = 'DATE';
    const TYPE_DATETIME = 'DATETIME';
    const TYPE_TIMESTAMP = 'TIMESTAMP';
    const TYPE_TIME = 'TIME';
    const TYPE_YEAR = 'YEAR';

    /**
     * Text types
     */
    const TYPE_CHAR = 'CHAR';
    const TYPE_VARCHAR = 'VARCHAR';
    const TYPE_TINYTEXT = 'TINYTEXT';
    const TYPE_TEXT = 'TEXT';
    const TYPE_MEDIUMTEXT = 'MEDIUMTEXT';
    const TYPE_LONGTEXT = 'LONGTEXT';
    const TYPE_BINARY = 'BINARY';
    const TYPE_VARBINARY = 'VARBINARY';
    const TYPE_TINYBLOB = 'TINYBLOB';
    const TYPE_MEDIUMBLOB = 'MEDIUMBLOB';
    const TYPE_BLOB = 'BLOB';
    const TYPE_LONGBLOB = 'LONGBLOB';
    const TYPE_ENUM = 'ENUM';
    const TYPE_SET = 'SET';

    /**
     * Spatial types
     */
    const TYPE_GEOMETRY = 'GEOMETRY';
    const TYPE_POINT = 'POINT';
    const TYPE_LINESTRING = 'LINESTRING';
    const TYPE_POLYGON = 'POLYGON';
    const TYPE_MULTIPOINT = 'MULTIPOINT';
    const TYPE_MULTILINESTRING = 'MULTILINESTRING';
    const TYPE_MULTIPOLYGON = 'MULTIPOLYGON';
    const TYPE_GEOMETRYCOLLECTION = 'GEOMETRYCOLLECTION';

    /**
     * JSON types
     */
    const TYPE_JSON = 'JSON';
}
