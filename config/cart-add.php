<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cradd',
    'description' => /* @text */'Add cart item',
    'usage' => array(
        'gplcart (cart-add | cradd) -h',
        'gplcart (cart-add | cradd)',
        'gplcart (cart-add | cradd) (--user_id=<varchar> --sku=<varchar> --product_id=<int> --store_id=<int>)
        [--order_id=<int> --quantity=<int> --data=<json>]',
    ),
    'options' => array(
        '--user_id' => /* @text */'User ID',
        '--sku' => /* @text */'Product SKU',
        '--product_id' => /* @text */'Product ID',
        '--store_id' => /* @text */'Store ID',
        '--order_id' => /* @text */'Order ID [default: 0]',
        '--quantity' => /* @text */'Product quantity [default: 1]',
        '--data' => /* @text */'JSON string',
        '-h' => /* @text */'Show command help'
    )
);
