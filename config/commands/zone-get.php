<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'zget',
    'access' => 'zone',
    'description' => 'Display one or several zones', // @text
    'usage' => array(
        'gplcart (zone-get | zget) -h',
        'gplcart (zone-get | zget) [-f=<format> -l=<offset,limit> -u=<int>]',
        'gplcart (szone-get | zget) <zone id> [-f=<format> -u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]' // @text

    )
);
