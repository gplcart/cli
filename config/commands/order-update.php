<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'oup',
    'description' => 'Update order', // @text
    'usage' => array(
        'gplcart (order-update | oup) -h',
        'gplcart (order-update | oup) <order id> (--user_id=<int> | --payment=<varchar> | --shipping=<varchar>
        | --status=<varchar> |--store_id=<int> | --shipping_address=<int> | --payment_address=<int>
        | --total=<int> | --currency=<varchar> | --creator=<int> | --tracking_number=<varchar>
        | --transaction_id=<int> | --comment=<text> | --volume=<int> | --weight=<int> | --size_unit=<varchar>
        | --weight_unit=<varchar> | --data=<json>)',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
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
