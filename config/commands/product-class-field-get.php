<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pcfget',
    'description' => /* @text */'Display one or several product class fields',
    'usage' => array(
        'gplcart (product-class-field-get | pcfget) -h',
        'gplcart (product-class-field-get | pcfget) [-f=<format> -l=<offset,limit>]',
        'gplcart (product-class-field-get | pcfget) <product class field id> [-f=<format>]',
        'gplcart (product-class-field-get | pcfget) --class [-f=<format> -l=<offset,limit>]',
        'gplcart (product-class-field-get | pcfget) --field [-f=<format> -l=<offset,limit>]',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '-f' => /* @text */'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]',
        '--class' => /* @text */'Display all product class fields with the product class ID argument',
        '--field' => /* @text */'Display all product class fields with the field ID argument'
    )
);
