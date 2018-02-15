<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pcfget',
    'access' => 'product_class',
    'description' => 'Display one or several product class fields', // @text
    'usage' => array(
        'gplcart (product-class-field-get | pcfget) -h',
        'gplcart (product-class-field-get | pcfget) [-f=<format> -l=<offset,limit> -u=<int>]',
        'gplcart (product-class-field-get | pcfget) <product class field id> [-f=<format> -u=<int>]',
        'gplcart (product-class-field-get | pcfget) --class [-f=<format> -l=<offset,limit> -u=<int>]',
        'gplcart (product-class-field-get | pcfget) --field [-f=<format> -l=<offset,limit> -u=<int>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '-u' => 'Current user ID for access control', // @text
        '--class' => 'Display all product class fields with the product class ID argument', // @text
        '--field' => 'Display all product class fields with the field ID argument' // @text
    )
);
