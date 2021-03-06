<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'edel',
    'access' => 'admin',
    'description' => 'Delete logged system events', // @text
    'usage' => array(
        'gplcart (event-delete | edel) -h',
        'gplcart (event-delete | edel) [--expired] [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Display help message', // @text
        '-u' => 'Current user ID for access control', // @text
        '--expired' => 'Delete only expired records' // @text
    )
);
