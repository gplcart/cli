<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pcfup',
    'description' => /* @text */'Update product class field',
    'usage' => array(
        'gplcart (product-class-field-update | pcfup) -h',
        'gplcart (product-class-field-update | pcfup) <product class field id>
        (--product_class_id=<int> | --field_id=<int> | --required=<bool> | --multiple=<bool> | --weight=<int>)',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--product_class_id' => /* @text */'Product class ID',
        '--field_id' => /* @text */'Field ID',
        '--required' => /* @text */'Required',
        '--multiple' => /* @text */'Multiple',
        '--weight' => /* @text */'Weight'
    )
);
