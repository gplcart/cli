<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pdel',
    'description' => /* @text */'Delete one or several products',
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
        '-h' => /* @text */'Show command help',
        '--all' => /* @text */'Delete ALL products if no ID specified',
        '--user' => /* @text */'Delete ALL products with the user ID argument',
        '--store' => /* @text */'Delete ALL products with the store ID argument',
        '--category' => /* @text */'Delete ALL products with the category ID argument',
        '--class' => /* @text */'Delete ALL products with the product class ID argument',
        '--brand' => /* @text */'Delete ALL products with the brand category ID argument'
    )
);
