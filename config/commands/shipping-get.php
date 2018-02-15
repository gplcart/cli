<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'smget',
    'access' => 'admin',
    'description' => 'Display one or several shipping methods', // @text
    'usage' => array(
        'gplcart (shipping-get | smget) -h',
        'gplcart (shipping-get | smget) [-f=<format> -l=<offset,limit> -u=<int>]',
        'gplcart (shipping-get | smget) <shipping method id> [-f=<format> -u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '-u' => 'Current user ID for access control', // @text
    )
);
