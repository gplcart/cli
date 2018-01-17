<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'sget',
    'description' => /* @text */'Display one or several stores',
    'usage' => array(
        'gplcart (store-get | sget) -h',
        'gplcart (store-get | sget) [-f=<format> -l=<number>]',
        'gplcart (store-get | sget) <store id> [-f=<format>]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '-f' => /* @text */'Format of displayed data. Allowed values: print-r, var-export, var-dump, json, table [default: table]'
    )
);
