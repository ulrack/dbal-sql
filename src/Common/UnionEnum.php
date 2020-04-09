<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Common;

use GrizzIt\Enum\Enum;

/**
 * @method static UnionEnum DISTINCT()
 * @method static UnionEnum ALL()
 */
class UnionEnum extends Enum
{
    /**
     * Defines the union query which selects distinct values.
     *
     * @var string
     */
    const DISTINCT = '%s UNION %s';

    /**
     * Defines the union query which selects all values.
     *
     * @var string
     */
    const ALL = '%s UNION ALL %s';
}
