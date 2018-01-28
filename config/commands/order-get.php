<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'oget',
    'description' => /* @text */'Display one or several orders',
    'usage' => array(
        'gplcart (order-get | oget) -h',
        'gplcart (order-get | oget) [-f=<format> -l=<offset,limit>]',
        'gplcart (order-get | oget) <order id> [-f=<format>]',
        'gplcart (order-get | oget) <user id> --user [-f=<format> -l=<offset,limit>]',
        'gplcart (order-get | oget) <store id> --store [-f=<format> -l=<offset,limit>]',
        'gplcart (order-get | oget) <shipping address id> --shipping-address [-f=<format> -l=<offset,limit>]',
        'gplcart (order-get | oget) <payment address id> --payment-address [-f=<format> -l=<offset,limit>]',
        'gplcart (order-get | oget) <status name> --status [-f=<format> -l=<offset,limit>]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '-f' => /* @text */'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]',
        '--user' => /* @text */'Display all orders with the user ID argument',
        '--store' => /* @text */'Display all orders with the store ID argument',
        '--shipping-address' => /* @text */'Display all orders with the shipping address ID argument',
        '--payment-address' => /* @text */'Display all orders with the payment address ID argument',
        '--status' => /* @text */'Display all orders with the status name argument',
    )
);
