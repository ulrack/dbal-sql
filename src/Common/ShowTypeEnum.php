<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Common;

use Ulrack\Enum\Enum;

/**
 * @method static ShowTypeEnum SHOW_DATABASES()
 * @method static ShowTypeEnum SHOW_TABLES()
 */
class ShowTypeEnum extends Enum
{
    /**
     * Contains the show databases keyword.
     *
     * @var string
     */
    const SHOW_DATABASES = 'DATABASES';

    /**
     * Contains the show tables keyword.
     *
     * @var string
     */
    const SHOW_TABLES = 'TABLES';
}
