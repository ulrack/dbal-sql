<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Common;

use Ulrack\Enum\Enum;

/**
 * @method static ComparatorEnum COMPARATOR_EQ()
 * @method static ComparatorEnum COMPARATOR_NEQ()
 * @method static ComparatorEnum COMPARATOR_GT()
 * @method static ComparatorEnum COMPARATOR_GTEQ()
 * @method static ComparatorEnum COMPARATOR_LT()
 * @method static ComparatorEnum COMPARATOR_LTEQ()
 * @method static ComparatorEnum COMPARATOR_IN()
 * @method static ComparatorEnum COMPARATOR_NIN()
 * @method static ComparatorEnum COMPARATOR_LIKE()
 * @method static ComparatorEnum COMPARATOR_NOT_LIKE()
 * @method static ComparatorEnum COMPARATOR_IS_NULL()
 * @method static ComparatorEnum COMPARATOR_NOT_NULL()
 */
class ComparatorEnum extends Enum
{
    /**
     * Equals comparator "=".
     * Checks if the field equals the value.
     *
     * @var string
     */
    const COMPARATOR_EQ = '= %s';

    /**
     * Not equals comparator "<>".
     * Checks if the field does not equal the value.
     *
     * @var string
     */
    const COMPARATOR_NEQ = '<> %s';

    /**
     * Greater than comparator ">".
     * Checks if the field is greater than the value.
     *
     * @var string
     */
    const COMPARATOR_GT = '> %s';

    /**
     * Greater than or equals comparator ">=".
     * Checks if the field is greater than or equals the value.
     *
     * @var string
     */
    const COMPARATOR_GTEQ = '>= %s';

    /**
     * Less than comparator "<".
     * Checks if the field is less than the value.
     *
     * @var string
     */
    const COMPARATOR_LT = '< %s';

    /**
     * Less than or equals comparator "<=".
     * Checks if the field is less than or equals the value.
     *
     * @var string
     */
    const COMPARATOR_LTEQ = '<= %s';

    /**
     * In comparator.
     * Checks if the field occurs in the value.
     *
     * @var string
     */
    const COMPARATOR_IN = 'IN (%s)';

    /**
     * Not in comparator.
     * Checks if the field does not occur in the value.
     *
     * @var string
     */
    const COMPARATOR_NIN = 'NOT IN (%s)';

    /**
     * Like comparator.
     * Checks if the field looks like the value.
     *
     * @var string
     */
    const COMPARATOR_LIKE = 'LIKE %s';

    /**
     * Not like comparator.
     * Checks if the field does not look like the value.
     *
     * @var string
     */
    const COMPARATOR_NOT_LIKE = 'NOT LIKE %s';

    /**
     * Is null comparator.
     * Checks if the field is null.
     *
     * @var string
     */
    const COMPARATOR_IS_NULL = 'IS NULL';

    /**
     * Not null comparator.
     * Checks if the field is not null.
     *
     * @var string
     */
    const COMPARATOR_NOT_NULL = 'NOT NULL';
}
