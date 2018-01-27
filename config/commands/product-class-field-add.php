<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pcfadd',
    'description' => /* @text */'Add product class field',
    'usage' => array(
        'gplcart (product-class-field-add | pcfadd) -h',
        'gplcart (product-class-field-add | pcfadd)',
        'gplcart (product-class-field-add | pcfadd) --product_class_id=<int> --field_id=<int>
        [--required=<bool> --multiple=<bool> --weight=<int>]',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--product_class_id' => /* @text */'Product class ID',
        '--field_id' => /* @text */'Field ID',
        '--required' => /* @text */'Required' . ' [default: 0]',
        '--multiple' => /* @text */'Multiple' . ' [default: 0]',
        '--weight' => /* @text */'Weight' . ' [default: 0]'
    )
);
