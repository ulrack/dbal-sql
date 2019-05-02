<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Common;

use Ulrack\Enum\Enum;

/**
 * @method static ColumnAttributeEnum ATTRIBUTE_BINARY()
 * @method static ColumnAttributeEnum ATTRIBUTE_UNSIGNED()
 * @method static ColumnAttributeEnum ATTRIBUTE_ZEROFILL()
 * @method static ColumnAttributeEnum ATTRIBUTE_ON_UPDATE_NOW()
 */
class ColumnAttributeEnum extends Enum
{
    const ATTRIBUTE_BINARY = 'BINARY';
    const ATTRIBUTE_UNSIGNED = 'UNSIGNED';
    const ATTRIBUTE_ZEROFILL = 'UNSIGNED ZEROFILL';
    const ATTRIBUTE_ON_UPDATE_NOW = 'on update CURRENT_TIMESTAMP';
}
