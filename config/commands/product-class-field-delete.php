<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pcfdel',
    'access' => 'product_class_edit',
    'description' => 'Delete one or several product class fields', // @text
    'usage' => array(
        'gplcart (product-class-field-delete | pcfdel) -h',
        'gplcart (product-class-field-delete | pcfdel) --all [-u=<int>]',
        'gplcart (product-class-field-delete | pcfdel) <product class field id> [-u=<int>]',
        'gplcart (product-class-field-delete | pcfdel) <product class id> --class [-u=<int>]',
        'gplcart (product-class-field-delete | pcfdel) <field id> --field [-u=<int>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--all' => 'Delete ALL product class fields if no ID specified', // @text
        '--field' => 'Delete ALL product class fields with the field ID argument', // @text
        '--class' => 'Delete ALL product class fields with the product class ID argument' // @text
    )
);
