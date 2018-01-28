<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'odel',
    'description' => /* @text */'Delete one or several orders',
    'usage' => array(
        'gplcart (order-delete | odel) -h',
        'gplcart (order-delete | odel) <order id>',
        'gplcart (order-delete | odel) <user id> --user',
        'gplcart (order-delete | odel) <store id> --store',
        'gplcart (order-delete | odel) <status name> --status'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--user' => /* @text */'Delete ALL orders with the user ID argument',
        '--store' => /* @text */'Delete ALL orders with the store ID argument',
        '--status' => /* @text */'Delete ALL orders with the status name argument',
    )
);
