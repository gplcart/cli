<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cliget',
    'description' => /* @text */'Display one or several collection items',
    'usage' => array(
        'gplcart (collection-item-get | cliget) -h',
        'gplcart (collection-item-get | cliget) [-f=<format> -l=<offset,limit>]',
        'gplcart (collection-item-get | cliget) <collection item id> [-f=<format>]',
        'gplcart (collection-item-get | cliget) <collection id> --collection [-f=<format> -l=<offset,limit>]',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-f' => /* @text */'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '--collection' => /* @text */'Display all collection items for the collection ID argument',
    )
);
