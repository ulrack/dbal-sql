<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Common;

use Ulrack\Enum\Enum;

/**
 * @method static IndexTypeEnum INDEX_PRIMARY()
 * @method static IndexTypeEnum INDEX_UNIQUE()
 * @method static IndexTypeEnum INDEX_INDEX()
 * @method static IndexTypeEnum INDEX_FULLTEXT()
 * @method static IndexTypeEnum INDEX_SPATIAL()
 */
class IndexTypeEnum extends Enum
{
    const INDEX_PRIMARY = 'PRIMARY';
    const INDEX_UNIQUE = 'UNIQUE';
    const INDEX_INDEX = 'INDEX';
    const INDEX_FULLTEXT = 'FULLTEXT';
    const INDEX_SPATIAL = 'SPATIAL';
}
