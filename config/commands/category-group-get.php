<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cgget',
    'description' => 'Display one or several category groups', // @text
    'usage' => array(
        'gplcart (category-group-get | cgget) -h',
        'gplcart (category-group-get | cgget) [-f=<format> -l=<offset,limit>]',
        'gplcart (category-group-get | cgget) <category group id> [-f=<format>]',
        'gplcart (category-group-get | cgget) <type> --type [-f=<format> -l=<offset,limit>]',
        'gplcart (category-group-get | cgget) <store id> --store [-f=<format> -l=<offset,limit>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '--store' => 'Display all category groups with the store ID argument', // @text
        '--type' => 'Display all category groups with the type argument' // @text
    )
);
