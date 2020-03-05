<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Common;

use Ulrack\Enum\Enum;

/**
 * @method static ColumnDefaultEnum NONE()
 * @method static ColumnDefaultEnum DEFAULT_NULL()
 * @method static ColumnDefaultEnum CURRENT_TIMESTAMP()
 */
class ColumnDefaultEnum extends Enum
{
    const NONE = '';
    const DEFAULT_NULL = 'NULL';
    const CURRENT_TIMESTAMP = 'CURRENT_TIMESTAMP';
}
