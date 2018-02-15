<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'padd',
    'access' => 'product_add',
    'description' => 'Add product', // @text
    'usage' => array(
        'gplcart (product-add | padd) -h',
        'gplcart (product-add | padd) [-u=<int>]',
        'gplcart (product-add | padd) (--title=<varchar> --description=<text> --store_id=<int> --sku=<varchar>) [options]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
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
