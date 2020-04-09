<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Common;

use GrizzIt\Enum\Enum;

/**
 * @method static ColumnAttributeEnum BINARY()
 * @method static ColumnAttributeEnum UNSIGNED()
 * @method static ColumnAttributeEnum ZEROFILL()
 * @method static ColumnAttributeEnum ON_UPDATE_NOW()
 */
class ColumnAttributeEnum extends Enum
{
    const BINARY = 'BINARY';
    const UNSIGNED = 'UNSIGNED';
    const ZEROFILL = 'UNSIGNED ZEROFILL';
    const ON_UPDATE_NOW = 'on update CURRENT_TIMESTAMP';
}
