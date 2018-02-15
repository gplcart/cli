<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pget',
    'access' => 'product',
    'description' => 'Display one or several products', // @text
    'usage' => array(
        'gplcart (product-get | pget) -h',
        'gplcart (product-get | pget) <product id> [-f=<format> -u=<int>]',
        'gplcart (product-get | pget) [-f=<format> -l=<offset,limit> -u=<int>]',
        'gplcart (product-get | pget) <user id> --user [-f=<format> -l=<offset,limit> -u=<int>]',
        'gplcart (product-get | pget) <store id> --store [-f=<format> -l=<offset,limit> -u=<int>]',
        'gplcart (product-get | pget) <category id> --category [-f=<format> -l=<offset,limit> -u=<int>]',
        'gplcart (product-get | pget) <product class id> --class [-f=<format> -l=<offset,limit> -u=<int>]',
        'gplcart (product-get | pget) <brand category id> --brand [-f=<format> -l=<offset,limit> -u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '-u' => 'Current user ID for access control', // @text
        '--user' => 'Display all products with the user ID argument', // @text
        '--store' => 'Display all products with the store ID argument', // @text
        '--category' => 'Display all products with the category ID argument', // @text
        '--class' => 'Display all products with the product class ID argument', // @text
        '--brand' => 'Display all products with the brand category ID argument', // @text
    )
);
