<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'crdel',
    'access' => 'cart_delete',
    'description' => 'Delete one or several cart items', // @text
    'usage' => array(
        'gplcart (cart-delete | crdel) -h',
        'gplcart (cart-delete | crdel) <cart id> [-u=<integer>]',
        'gplcart (cart-delete | crdel) <sku> --sku [-u=<integer>]',
        'gplcart (cart-delete | crdel) <user id> --user [-u=<integer>]',
        'gplcart (cart-delete | crdel) <order id> --order [-u=<integer>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--sku' => 'Delete ALL cart items with the SKU argument', // @text
        '--user' => 'Delete ALL cart items with the user ID argument', // @text
        '--order' => 'Delete ALL cart items with the order ID argument' // @text
    )
);
