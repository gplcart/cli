<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'oadd',
    'description' => /* @text */'Add order',
    'usage' => array(
        'gplcart (order-add | oadd) -h',
        'gplcart (order-add | oadd)',
        'gplcart (order-add | oadd) (--user_id=<int> --payment=<varchar> --shipping=<varchar> --status=<varchar>)
        [--store_id=<int> --shipping_address=<int> --payment_address=<int> --total=<int> --currency=<varchar> --creator=<int>
        --tracking_number=<varchar> --transaction_id=<int> --comment=<text> --volume=<int> --weight=<int> --size_unit=<varchar>
        --weight_unit=<varchar> --data=<json>]',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--user_id' => /* @text */'User ID',
        '--payment' => /* @text */'Payment method',
        '--shipping' => /* @text */'Shipping method',
        '--status' => /* @text */'Status',
        '--store_id' => /* @text */'Store ID',
        '--shipping_address' => /* @text */'Shipping address',
        '--payment_address' => /* @text */'Payment address',
        '--total' => /* @text */'Total',
        '--currency' => /* @text */'Currency',
        '--creator' => /* @text */'Creator',
        '--tracking_number' => /* @text */'Tracking number',
        '--transaction_id' => /* @text */'Transaction ID',
        '--comment' => /* @text */'Comment',
        '--volume' => /* @text */'Volume',
        '--weight' => /* @text */'Weight',
        '--size_unit' => /* @text */'Size unit',
        '--weight_unit' => /* @text */'Weight unit',
        '--data' => /* @text */'Data'
    )
);
