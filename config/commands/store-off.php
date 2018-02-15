<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'soff',
    'access' => 'store_edit',
    'description' => 'Disable one or several stores', // @text
    'usage' => array(
        'gplcart (store-off | soff) -h',
        'gplcart (store-off | soff) --all [-u=<int>]',
        'gplcart (store-off | soff) <store id> [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--all' => 'Disable ALL stores if no ID specified' // @text
    )
);
