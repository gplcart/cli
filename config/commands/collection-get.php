<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'clget',
    'access' => 'collection',
    'description' => 'Display one or several collections', // @text
    'usage' => array(
        'gplcart (collection-get | clget) -h',
        'gplcart (collection-get | clget) [-f=<format> -l=<offset,limit> -u=<int>]',
        'gplcart (collection-get | clget) <collection id> [-f=<format> -u=<int>]',
        'gplcart (collection-get | clget) <type> --type [-f=<format> -l=<offset,limit> -u=<int>]',
        'gplcart (collection-get | clget) <store id> --store [-f=<format> -l=<offset,limit> -u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '-u' => 'Current user ID for access control', // @text
        '--type' => 'Display all collections with the type argument', // @text
        '--store' => 'Display all collections with the store ID argument' // @text
    )
);
