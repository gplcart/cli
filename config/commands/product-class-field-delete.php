<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pcfdel',
    'description' => /* @text */'Delete one or several product class fields',
    'usage' => array(
        'gplcart (product-class-field-delete | pcfdel) -h',
        'gplcart (product-class-field-delete | pcfdel) --all',
        'gplcart (product-class-field-delete | pcfdel) <product class field id>',
        'gplcart (product-class-field-delete | pcfdel) <product class id> --class',
        'gplcart (product-class-field-delete | pcfdel) <field id> --field',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--all' => /* @text */'Delete ALL product class fields if no ID specified',
        '--field' => /* @text */'Delete ALL product class fields with the field ID argument',
        '--class' => /* @text */'Delete ALL product class fields with the product class ID argument'
    )
);
