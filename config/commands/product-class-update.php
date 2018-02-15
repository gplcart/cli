<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pcup',
    'access' => 'product_class_edit',
    'description' => 'Update product class', // @text
    'usage' => array(
        'gplcart (product-class-update | pcup) -h',
        'gplcart (product-class-update | pcup) [-u=<int>]',
        'gplcart (product-class-update | pcup) <product class id> (--title=<varchar> | --status=<bool>) [-u=<int>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--title' => 'Title', // @text
        '--status' => 'Status' // @text
    )
);
