<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Dbal\Sql\Component\Query\View;

use Ulrack\Dbal\Common\QueryInterface;

class DropViewQuery implements QueryInterface
{
    /**
     * Contains the view that is being dropped.
     *
     * @var string
     */
    private $view;

    /**
     * Constructor
     *
     * @param string $view
     */
    public function __construct(string $view)
    {
        $this->view = $view;
    }

    /**
     * Builds the query and returns it.
     *
     * @return string
     */
    public function getQuery(): string
    {
        return sprintf(
            'DROP VIEW %s;',
            $this->view
        );
    }
}
