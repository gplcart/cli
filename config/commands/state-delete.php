<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'csdel',
    'access' => 'state_delete',
    'description' => 'Delete one or several country states', // @text
    'usage' => array(
        'gplcart (state-delete | csdel) -h',
        'gplcart (state-delete | csdel) <state id> [-u=<int>]',
        'gplcart (state-delete | csdel) <country code> --country [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--country' => 'Delete ALL country states with the country code argument' // @text
    )
);
