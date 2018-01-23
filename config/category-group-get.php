<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cgget',
    'description' => /* @text */'Display one or several category groups',
    'usage' => array(
        'gplcart (category-group-get | cgget) -h',
        'gplcart (category-group-get | cgget) [-f=<format> -l=<offset,limit>]',
        'gplcart (category-group-get | cgget) <category group id> [-f=<format>]',
        'gplcart (category-group-get | cgget) <type> --type [-f=<format> -l=<offset,limit>]',
        'gplcart (category-group-get | cgget) <store id> --store [-f=<format> -l=<offset,limit>]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-f' => /* @text */'Format of displayed data. Allowed values: print-r, var-export, var-dump, json, table [default: table]',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '--store' => /* @text */'Specifies that a store ID used instead of category group ID',
        '--type' => /* @text */'Specifies that a category group type used instead of category group ID'
    )
);
