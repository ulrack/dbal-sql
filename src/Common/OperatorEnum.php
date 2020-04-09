<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Common;

use GrizzIt\Enum\Enum;

/**
 * @method static OperatorEnum ANY()
 * @method static OperatorEnum ALL()
 */
class OperatorEnum extends Enum
{
    /**
     * Creates a ANY matching filter.
     *
     * @var string
     */
    const ANY = 'ANY';

    /**
     * Creates a ALL matching filter.
     *
     * @var string
     */
    const ALL = 'ALL';
}
