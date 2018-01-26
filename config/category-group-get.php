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
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '-f' => /* @text */'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]',
        '--store' => /* @text */'Display all category groups for the store ID argument',
        '--type' => /* @text */'Display all category groups for the type argument'
    )
);
