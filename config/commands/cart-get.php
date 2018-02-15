<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'crget',
    'access' => 'cart',
    'description' => 'Display one or several cart items', // @text
    'usage' => array(
        'gplcart (cart-get | crget) -h',
        'gplcart (cart-get | crget) [-f=<format> -l=<offset,limit>] [-u=<integer>]',
        'gplcart (cart-get | crget) <cart id> [-f=<format>] [-u=<integer>]',
        'gplcart (cart-get | crget) <user id> --user [-f=<format> -l=<offset,limit>] [-u=<integer>]',
        'gplcart (cart-get | crget) <order id> --order [-f=<format> -l=<offset,limit>] [-u=<integer>]',
        'gplcart (cart-get | crget) <sku> --sku [-f=<format> -l=<offset,limit>] [-u=<integer>]',
        'gplcart (cart-get | crget) <store id> --store [-f=<format> -l=<offset,limit>] [-u=<integer>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '-u' => 'Current user ID for access control', // @text
        '--user' => 'Display all cart items with the user ID argument', // @text
        '--order' => 'Display all cart items with the order ID argument', // @text
        '--sku' => 'Display all cart items with the SKU argument', // @text
        '--store' => 'Display all cart items with the store ID argument', // @text
    )
);
