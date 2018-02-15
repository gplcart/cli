<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pcdel',
    'access' => 'product_class_delete',
    'description' => 'Delete one or several product classes', // @text
    'usage' => array(
        'gplcart (product-class-delete | pcdel) -h',
        'gplcart (product-class-delete | pcdel) --all [-u=<int>]',
        'gplcart (product-class-delete | pcdel) <product class id> [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--all' => 'Delete ALL product classes if no ID specified' // @text
    )
);
