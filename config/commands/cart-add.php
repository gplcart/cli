<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cradd',
    'description' => 'Add cart item', // @text
    'usage' => array(
        'gplcart (cart-add | cradd) -h',
        'gplcart (cart-add | cradd)',
        'gplcart (cart-add | cradd) (--user_id=<varchar> --sku=<varchar> --product_id=<int> --store_id=<int>)
        [--order_id=<int> --quantity=<int> --data=<varchar>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--user_id' => 'User ID', // @text
        '--sku' => 'SKU', // @text
        '--product_id' => 'Product ID', // @text
        '--store_id' => 'Store ID', // @text
        '--order_id' => 'Order ID', // @text
        '--quantity' => 'Quantity', // @text
        '--data' => 'JSON or base64 encoded JSON string' // @text
    )
);
