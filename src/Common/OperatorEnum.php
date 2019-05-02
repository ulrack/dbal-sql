<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Common;

use Ulrack\Enum\Enum;

/**
 * @method static OperatorEnum OPERATOR_ANY()
 * @method static OperatorEnum OPERATOR_ALL()
 */
class OperatorEnum extends Enum
{
    /**
     * Creates a ANY matching filter.
     *
     * @var string
     */
    const OPERATOR_ANY = 'ANY';

    /**
     * Creates a ALL matching filter.
     *
     * @var string
     */
    const OPERATOR_ALL = 'ALL';
}
