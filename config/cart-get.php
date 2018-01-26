<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'crget',
    'description' => /* @text */'Display one or several cart items',
    'usage' => array(
        'gplcart (cart-get | crget) -h',
        'gplcart (cart-get | crget) [-f=<format> -l=<offset,limit>]',
        'gplcart (cart-get | crget) <cart id> [-f=<format>]',
        'gplcart (cart-get | crget) <user id> --user [-f=<format> -l=<offset,limit>]',
        'gplcart (cart-get | crget) <order id> --order [-f=<format> -l=<offset,limit>]',
        'gplcart (cart-get | crget) <sku> --sku [-f=<format> -l=<offset,limit>]',
        'gplcart (cart-get | crget) <store id> --store [-f=<format> -l=<offset,limit>]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-f' => /* @text */'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '--user' => /* @text */'Display all cart items for the user ID',
        '--order' => /* @text */'Display all cart items for the order ID',
        '--sku' => /* @text */'Display all cart items for the SKU',
        '--store' => /* @text */'Display all cart items for the store ID',
    )
);
