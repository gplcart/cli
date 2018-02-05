<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'crdel',
    'description' => 'Delete one or several cart items', // @text
    'usage' => array(
        'gplcart (cart-delete | crdel) -h',
        'gplcart (cart-delete | crdel) <cart id>',
        'gplcart (cart-delete | crdel) <sku> --sku',
        'gplcart (cart-delete | crdel) <user id> --user',
        'gplcart (cart-delete | crdel) <order id> --order'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--sku' => 'Delete ALL cart items with the SKU argument', // @text
        '--user' => 'Delete ALL cart items with the user ID argument', // @text
        '--order' => 'Delete ALL cart items with the order ID argument' // @text
    )
);
