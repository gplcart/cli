<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pget',
    'description' => /* @text */'Display one or several products',
    'usage' => array(
        'gplcart (product-get | pget) -h',
        'gplcart (product-get | pget) <product id> [-f=<format>]',
        'gplcart (product-get | pget) [-f=<format> -l=<offset,limit>]',
        'gplcart (product-get | pget) <user id> --user [-f=<format> -l=<offset,limit>]',
        'gplcart (product-get | pget) <store id> --store [-f=<format> -l=<offset,limit>]',
        'gplcart (product-get | pget) <category id> --category [-f=<format> -l=<offset,limit>]',
        'gplcart (product-get | pget) <product class id> --class [-f=<format> -l=<offset,limit>]',
        'gplcart (product-get | pget) <brand category id> --brand [-f=<format> -l=<offset,limit>]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-f' => /* @text */'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '--user' => /* @text */'Display all products with the user ID argument',
        '--store' => /* @text */'Display all products with the store ID argument',
        '--category' => /* @text */'Display all products with the category ID argument',
        '--class' => /* @text */'Display all products with the product class ID argument',
        '--brand' => /* @text */'Display all products with the brand category ID argument',
    )
);