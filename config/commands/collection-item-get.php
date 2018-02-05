<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cliget',
    'description' => 'Display one or several collection items', // @text
    'usage' => array(
        'gplcart (collection-item-get | cliget) -h',
        'gplcart (collection-item-get | cliget) [-f=<format> -l=<offset,limit>]',
        'gplcart (collection-item-get | cliget) <collection item id> [-f=<format>]',
        'gplcart (collection-item-get | cliget) <collection id> --collection [-f=<format> -l=<offset,limit>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '--collection' => 'Display all collection items with the collection ID argument', // @text
    )
);
