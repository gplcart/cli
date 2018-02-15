<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'odel',
    'access' => 'order_delete',
    'description' => 'Delete one or several orders', // @text
    'usage' => array(
        'gplcart (order-delete | odel) -h',
        'gplcart (order-delete | odel) <order id> [-u=<int>]',
        'gplcart (order-delete | odel) <user id> --user [-u=<int>]',
        'gplcart (order-delete | odel) <store id> --store [-u=<int>]',
        'gplcart (order-delete | odel) <status name> --status [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--user' => 'Delete ALL orders with the user ID argument', // @text
        '--store' => 'Delete ALL orders with the store ID argument', // @text
        '--status' => 'Delete ALL orders with the status name argument', // @text
    )
);
