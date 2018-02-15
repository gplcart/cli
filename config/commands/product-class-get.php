<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pcget',
    'access' => 'product_class',
    'description' => 'Display one or several product classes', // @text
    'usage' => array(
        'gplcart (product-class-get | pcget) -h',
        'gplcart (product-class-get | pcget) [-f=<format> -l=<offset,limit> -u=<int>]',
        'gplcart (product-class-get | pcget) <product class id> [-f=<format> -u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '-u' => 'Current user ID for access control', // @text
    )
);
