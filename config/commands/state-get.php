<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'csget',
    'access' => 'state',
    'description' => 'Display one or several country states', // @text
    'usage' => array(
        'gplcart (state-get | csget) -h',
        'gplcart (state-get | csget) [-f=<format> -l=<offset,limit> -u=<int>]',
        'gplcart (state-get | csget) <state id> [-f=<format> -u=<int>]',
        'gplcart (state-get | csget) <country code> --country [-f=<format> -l=<offset,limit> -u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '-u' => 'Current user ID for access control', // @text
        '--country' => 'Display all country states with the country code argument' // @text
    )
);
