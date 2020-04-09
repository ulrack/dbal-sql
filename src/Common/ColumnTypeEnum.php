<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Common;

use GrizzIt\Enum\Enum;

/**
 * @method static ColumnTypeEnum TINYINT()
 * @method static ColumnTypeEnum SMALLINT()
 * @method static ColumnTypeEnum MEDIUMINT()
 * @method static ColumnTypeEnum INT()
 * @method static ColumnTypeEnum BIGINT()
 * @method static ColumnTypeEnum DECIMAL()
 * @method static ColumnTypeEnum FLOAT()
 * @method static ColumnTypeEnum DOUBLE()
 * @method static ColumnTypeEnum BIT()
 * @method static ColumnTypeEnum BOOLEAN()
 * @method static ColumnTypeEnum DATE()
 * @method static ColumnTypeEnum DATETIME()
 * @method static ColumnTypeEnum TIMESTAMP()
 * @method static ColumnTypeEnum TIME()
 * @method static ColumnTypeEnum YEAR()
 * @method static ColumnTypeEnum CHAR()
 * @method static ColumnTypeEnum VARCHAR()
 * @method static ColumnTypeEnum TINYTEXT()
 * @method static ColumnTypeEnum MEDIUMTEXT()
 * @method static ColumnTypeEnum LONGTEXT()
 * @method static ColumnTypeEnum BINARY()
 * @method static ColumnTypeEnum VARBINARY()
 * @method static ColumnTypeEnum TINYBLOB()
 * @method static ColumnTypeEnum MEDIUMBLOB()
 * @method static ColumnTypeEnum BLOB()
 * @method static ColumnTypeEnum LONGBLOB()
 * @method static ColumnTypeEnum ENUM()
 * @method static ColumnTypeEnum SET()
 * @method static ColumnTypeEnum GEOMETRY()
 * @method static ColumnTypeEnum POINT()
 * @method static ColumnTypeEnum LINESTRING()
 * @method static ColumnTypeEnum POLYGON()
 * @method static ColumnTypeEnum MULTIPOINT()
 * @method static ColumnTypeEnum MULTILINESTRING()
 * @method static ColumnTypeEnum MULTIPOLYGON()
 * @method static ColumnTypeEnum GEOMETRYCOLLECTION()
 * @method static ColumnTypeEnum JSON()
 */

class ColumnTypeEnum extends Enum
{
    /**
     * Numeric types
     */
    const TINYINT = 'TINYINT';
    const SMALLINT = 'SMALLINT';
    const MEDIUMINT = 'MEDIUMINT';
    const INT = 'INT';
    const BIGINT = 'BIGINT';
    const DECIMAL = 'DECIMAL';
    const FLOAT = 'FLOAT';
    const DOUBLE = 'DOUBLE';
    const BIT = 'BIT';
    const BOOLEAN = 'BOOLEAN';

    /**
     * Date types
     */
    const DATE = 'DATE';
    const DATETIME = 'DATETIME';
    const TIMESTAMP = 'TIMESTAMP';
    const TIME = 'TIME';
    const YEAR = 'YEAR';

    /**
     * Text types
     */
    const CHAR = 'CHAR';
    const VARCHAR = 'VARCHAR';
    const TINYTEXT = 'TINYTEXT';
    const TEXT = 'TEXT';
    const MEDIUMTEXT = 'MEDIUMTEXT';
    const LONGTEXT = 'LONGTEXT';
    const BINARY = 'BINARY';
    const VARBINARY = 'VARBINARY';
    const TINYBLOB = 'TINYBLOB';
    const MEDIUMBLOB = 'MEDIUMBLOB';
    const BLOB = 'BLOB';
    const LONGBLOB = 'LONGBLOB';
    const ENUM = 'ENUM';
    const SET = 'SET';

    /**
     * Spatial types
     */
    const GEOMETRY = 'GEOMETRY';
    const POINT = 'POINT';
    const LINESTRING = 'LINESTRING';
    const POLYGON = 'POLYGON';
    const MULTIPOINT = 'MULTIPOINT';
    const MULTILINESTRING = 'MULTILINESTRING';
    const MULTIPOLYGON = 'MULTIPOLYGON';
    const GEOMETRYCOLLECTION = 'GEOMETRYCOLLECTION';

    /**
     * JSON types
     */
    const JSON = 'JSON';
}
