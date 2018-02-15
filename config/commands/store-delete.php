<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'sdel',
    'access' => 'store_delete',
    'description' => 'Delete store', // @text
    'usage' => array(
        'gplcart (store-delete | sdel) -h',
        'gplcart (store-delete | sdel) <store id> [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
    )
);
