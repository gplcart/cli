<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pup',
    'description' => /* @text */'Update product',
    'usage' => array(
        'gplcart (product-update | pup) -h',
        'gplcart (product-update | pup) <product id> (--title=<varchar> | --description=<text> | --store_id=<int>
        | --sku=<varchar> | --user_id=<int> | --category_id=<int> | --brand_category_id=<int> | --product_class_id=<int>
        | --meta_title=<varchar> | --meta_description=<varchar> | --status=<bool> | --subtract=<bool> | --price=<int>
        | --currency=<varchar> | --length=<int> | --width=<int> | --height=<int> | --weight=<int>
        | --size_unit=<varchar> | --weight_unit=<varchar> | --stock=<varchar>)',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--title' => /* @text */'Title',
        '--description' => /* @text */'Description',
        '--store_id' => /* @text */'Store ID',
        '--user_id' => /* @text */'User ID' . ' [default: 0]',
        '--category_id' => /* @text */'Category ID' . ' [default: 0]',
        '--brand_category_id' => /* @text */'Brand category ID' . ' [default: 0]',
        '--product_class_id' => /* @text */'Product class ID' . ' [default: 0]',
        '--meta_title' => /* @text */'Meta title' . ' [default: ]',
        '--meta_description' => /* @text */'Meta description' . ' [default: ]',
        '--status' => /* @text */'Status' . ' [default: 0]',
        '--subtract' => /* @text */'Subtract' . ' [default: 0]',
        '--price' => /* @text */'Price' . ' [default: 0]',
        '--currency' => /* @text */'Currency',
        '--length' => /* @text */'Length' . ' [default: 0]',
        '--width' => /* @text */'Width' . ' [default: 0]',
        '--height' => /* @text */'Height' . ' [default: 0]',
        '--weight' => /* @text */'Weight' . ' [default: 0]',
        '--size_unit' => /* @text */'Size unit',
        '--weight_unit' => /* @text */'Weight unit',
        '--sku' => /* @text */'SKU' . ' [default: ]',
        '--stock' => /* @text */'Stock' . ' [default: 0]',
    )
);
