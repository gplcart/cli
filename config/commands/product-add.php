<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'padd',
    'description' => 'Add product', // @text
    'usage' => array(
        'gplcart (product-add | padd) -h',
        'gplcart (product-add | padd)',
        'gplcart (product-add | padd) (--title=<varchar> --description=<text> --store_id=<int> --sku=<varchar>)
        [--user_id=<int> --category_id=<int> --brand_category_id=<int> --product_class_id=<int>
         --meta_title=<varchar> --meta_description=<varchar> --status=<bool> --subtract=<bool>
         --price=<int> --currency=<varchar> --length=<int> --width=<int> --height=<int>
         --weight=<int> --size_unit=<varchar> --weight_unit=<varchar> --stock=<varchar>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--title' => 'Title', // @text
        '--description' => 'Description', // @text
        '--store_id' => 'Store ID', // @text
        '--user_id' => 'User ID', // @text
        '--category_id' => 'Category ID', // @text
        '--brand_category_id' => 'Brand category ID', // @text
        '--product_class_id' => 'Product class ID', // @text
        '--meta_title' => 'Meta title', // @text
        '--meta_description' => 'Meta description', // @text
        '--status' => 'Status', // @text
        '--subtract' => 'Subtract', // @text
        '--price' => 'Price', // @text
        '--currency' => 'Currency', // @text
        '--length' => 'Length', // @text
        '--width' => 'Width', // @text
        '--height' => 'Height', // @text
        '--weight' => 'Weight', // @text
        '--size_unit' => 'Size unit', // @text
        '--weight_unit' => 'Weight unit', // @text
        '--sku' => 'SKU', // @text
        '--stock' => 'Stock', // @text
    )
);
