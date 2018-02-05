<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pdel',
    'description' => 'Delete one or several products', // @text
    'usage' => array(
        'gplcart (product-delete | pdel) -h',
        'gplcart (product-delete | pdel) --all',
        'gplcart (product-delete | pdel) <product id>',
        'gplcart (product-delete | pdel) <user id> --user [-f=<format> -l=<offset,limit>]',
        'gplcart (product-delete | pdel) <store id> --store [-f=<format> -l=<offset,limit>]',
        'gplcart (product-delete | pdel) <category id> --category [-f=<format> -l=<offset,limit>]',
        'gplcart (product-delete | pdel) <product class id> --class [-f=<format> -l=<offset,limit>]',
        'gplcart (product-delete | pdel) <brand category id> --brand [-f=<format> -l=<offset,limit>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--all' => 'Delete ALL products if no ID specified', // @text
        '--user' => 'Delete ALL products with the user ID argument', // @text
        '--store' => 'Delete ALL products with the store ID argument', // @text
        '--category' => 'Delete ALL products with the category ID argument', // @text
        '--class' => 'Delete ALL products with the product class ID argument', // @text
        '--brand' => 'Delete ALL products with the brand category ID argument' // @text
    )
);
