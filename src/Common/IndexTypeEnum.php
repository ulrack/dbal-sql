<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Common;

use GrizzIt\Enum\Enum;

/**
 * @method static IndexTypeEnum UNIQUE()
 * @method static IndexTypeEnum INDEX()
 * @method static IndexTypeEnum FULLTEXT()
 * @method static IndexTypeEnum SPATIAL()
 */
class IndexTypeEnum extends Enum
{
    const UNIQUE = 'UNIQUE INDEX';
    const INDEX = 'INDEX';
    const FULLTEXT = 'FULLTEXT INDEX';
    const SPATIAL = 'SPATIAL INDEX';
}
