<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'ciget',
    'access' => 'city',
    'description' => 'Display one or several cities', // @text
    'usage' => array(
        'gplcart (city-get | ciget) -h',
        'gplcart (city-get | ciget) [-f=<format> -l=<offset,limit> -u=<int>]',
        'gplcart (city-get | ciget) <city id> [-f=<format> -u=<int>]',
        'gplcart (city-get | ciget) <state id> --state [-f=<format> -l=<offset,limit> -u=<int>]',
        'gplcart (city-get | ciget) <country code> --country [-f=<format> -l=<offset,limit> -u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '-u' => 'Current user ID for access control', // @text
        '--state' => 'Display all cities with the country state ID argument', // @text
        '--country' => 'Display all cities with the country code argument', // @text
    )
);
