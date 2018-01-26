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
        '--all' => /* @text */'Delete all products',
        '--user' => /* @text */'Specifies that a user ID used instead of product ID',
        '--store' => /* @text */'Specifies that a store ID used instead of product ID',
        '--category' => /* @text */'Specifies that a category ID used instead of product ID',
        '--class' => /* @text */'Specifies that a product class ID used instead of product ID',
        '--brand' => /* @text */'Specifies that a brand category ID used instead of product ID',
    )
);
