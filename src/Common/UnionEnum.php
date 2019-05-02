<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Common;

use Ulrack\Enum\Enum;

/**
 * @method static UnionEnum UNION_DISTINCT()
 * @method static UnionEnum UNION_ALL()
 */
class UnionEnum extends Enum
{
    /**
     * Defines the union query which selects distinct values.
     *
     * @var string
     */
    const UNION_DISTINCT = '%s UNION %s';

    /**
     * Defines the union query which selects all values.
     *
     * @var string
     */
    const UNION_ALL = '%s UNION ALL %s';
}
