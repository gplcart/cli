<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pcfadd',
    'description' => 'Add product class field', // @text
    'usage' => array(
        'gplcart (product-class-field-add | pcfadd) -h',
        'gplcart (product-class-field-add | pcfadd)',
        'gplcart (product-class-field-add | pcfadd) --product_class_id=<int> --field_id=<int>
        [--required=<bool> --multiple=<bool> --weight=<int>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--product_class_id' => 'Product class ID', // @text
        '--field_id' => 'Field ID', // @text
        '--required' => 'Required', // @text
        '--multiple' => 'Multiple', // @text
        '--weight' => 'Weight' // @text
    )
);
