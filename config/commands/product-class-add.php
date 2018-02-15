<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pcadd',
    'access' => 'product_class_add',
    'description' => 'Add product class', // @text
    'usage' => array(
        'gplcart (product-class-add | pcadd) -h',
        'gplcart (product-class-add | pcadd) [-u=<int>]',
        'gplcart (product-class-add | pcadd) --title=<varchar> [--status=<bool>] [-u=<int>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--title' => 'Title', // @text
        '--status' => 'Status' // @text
    )
);
