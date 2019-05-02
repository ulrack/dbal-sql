<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Common;

use Ulrack\Enum\Enum;

/**
 * @method static ColumnDefaultEnum DEFAULT_NONE()
 * @method static ColumnDefaultEnum DEFAULT_NULL()
 * @method static ColumnDefaultEnum DEFAULT_CURRENT_TIMESTAMP()
 */
class ColumnDefaultEnum extends Enum
{
    const DEFAULT_NONE = '';
    const DEFAULT_NULL = 'NULL';
    const DEFAULT_CURRENT_TIMESTAMP = 'CURRENT_TIMESTAMP';
}
