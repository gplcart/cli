<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pcfdel',
    'description' => 'Delete one or several product class fields', // @text
    'usage' => array(
        'gplcart (product-class-field-delete | pcfdel) -h',
        'gplcart (product-class-field-delete | pcfdel) --all',
        'gplcart (product-class-field-delete | pcfdel) <product class field id>',
        'gplcart (product-class-field-delete | pcfdel) <product class id> --class',
        'gplcart (product-class-field-delete | pcfdel) <field id> --field',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--all' => 'Delete ALL product class fields if no ID specified', // @text
        '--field' => 'Delete ALL product class fields with the field ID argument', // @text
        '--class' => 'Delete ALL product class fields with the product class ID argument' // @text
    )
);
