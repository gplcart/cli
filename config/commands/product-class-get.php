<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pcget',
    'description' => /* @text */'Display one or several product classes',
    'usage' => array(
        'gplcart (product-class-get | pcget) -h',
        'gplcart (product-class-get | pcget) [-f=<format> -l=<offset,limit>]',
        'gplcart (product-class-get | pcget) <product class id> [-f=<format>]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '-f' => /* @text */'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]'
    )
);
