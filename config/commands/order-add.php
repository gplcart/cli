<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'oadd',
    'access' => 'order_add',
    'description' => 'Add order', // @text
    'usage' => array(
        'gplcart (order-add | oadd) -h',
        'gplcart (order-add | oadd) [-u=<int>]',
        'gplcart (order-add | oadd) (--user_id=<int> --payment=<varchar> --shipping=<varchar> --status=<varchar>) [options]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--user_id' => 'User ID', // @text
        '--payment' => 'Payment method', // @text
        '--shipping' => 'Shipping method', // @text
        '--status' => 'Status', // @text
        '--store_id' => 'Store ID', // @text
        '--shipping_address' => 'Shipping address', // @text
        '--payment_address' => 'Payment address', // @text
        '--total' => 'Total', // @text
        '--currency' => 'Currency', // @text
        '--creator' => 'Creator', // @text
        '--tracking_number' => 'Tracking number', // @text
        '--transaction_id' => 'Transaction ID', // @text
        '--comment' => 'Comment', // @text
        '--volume' => 'Volume', // @text
        '--weight' => 'Weight', // @text
        '--size_unit' => 'Size unit', // @text
        '--weight_unit' => 'Weight unit', // @text
        '--data' => 'JSON or base64 encoded JSON string' // @text
    )
);
