<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Component;

use Ulrack\Dbal\Common\Enum\SortDirectionEnum;

trait SortableQueryTrait
{
    /**
     * Contains all sorting data.
     *
     * @var array
     */
    private $sorting;

    /**
     * Adds a sorter to the query.
     *
     * @param string            $column
     * @param SortDirectionEnum $direction
     *
     * @return void
     */
    public function addSorter(
        string $column,
        SortDirectionEnum $direction
    ): void {
        $this->sorting[] = [$column, (string) $direction];
    }

    /**
     * Compiles the sorting part of the query.
     *
     * @return string
     */
    public function getSort(): string
    {
        if (empty($this->sorting)) {
            return '';
        }

        return sprintf(
            'ORDER BY %s',
            implode(
                ', ',
                array_map(
                    function (array $value) {
                        return implode(' ', $value);
                    },
                    $this->sorting
                )
            )
        );
    }
}
