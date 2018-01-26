<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'crdel',
    'description' => /* @text */'Delete one or several cart items',
    'usage' => array(
        'gplcart (cart-delete | crdel) -h',
        'gplcart (cart-delete | crdel) <cart id>',
        'gplcart (cart-delete | crdel) <sku> --sku',
        'gplcart (cart-delete | crdel) <user id> --user',
        'gplcart (cart-delete | crdel) <order id> --order'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--sku' => /* @text */'Delete ALL cart items with the SKU',
        '--user' => /* @text */'Delete ALL cart items for the user ID',
        '--order' => /* @text */'Delete ALL cart items for the order ID'
    )
);
