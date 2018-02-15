<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cradd',
    'access' => 'admin',
    'description' => 'Add cart item', // @text
    'usage' => array(
        'gplcart (cart-add | cradd) -h',
        'gplcart (cart-add | cradd) [-u=<integer>]',
        'gplcart (cart-add | cradd) (--user_id=<varchar> --sku=<varchar> --product_id=<int> --store_id=<int>)
        [--order_id=<int> --quantity=<int> --data=<varchar>] [-u=<integer>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--user_id' => 'User ID', // @text
        '--sku' => 'SKU', // @text
        '--product_id' => 'Product ID', // @text
        '--store_id' => 'Store ID', // @text
        '--order_id' => 'Order ID', // @text
        '--quantity' => 'Quantity', // @text
        '--data' => 'JSON or base64 encoded JSON string' // @text
    )
);
