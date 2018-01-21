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
        '--sku' => /* @text */'Specifies that a SKU used instead of cart ID',
        '--user' => /* @text */'Specifies that a user ID used instead of cart ID',
        '--order' => /* @text */'Specifies that an order ID used instead of cart ID'

    )
);
