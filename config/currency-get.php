<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cuget',
    'description' => /* @text */'Display one or several currencies',
    'usage' => array(
        'gplcart (currency-get | cuget) -h',
        'gplcart (currency-get | cuget) [-f=<format> -l=<number>]',
        'gplcart (currency-get | cuget) <currency code> [-f=<format>]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '-f' => /* @text */'Format of displayed data. Allowed values: print-r, var-export, var-dump, json, table [default: table]'
    )
);
