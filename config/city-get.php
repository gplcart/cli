<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'ciget',
    'description' => /* @text */'Display one or several cities',
    'usage' => array(
        'gplcart (city-get | ciget) -h',
        'gplcart (city-get | ciget) [-f=<format> -l=<number>]',
        'gplcart (city-get | ciget) <city id> [-f=<format>]',
        'gplcart (city-get | ciget) <state id> --state [-f=<format>]',
        'gplcart (city-get | ciget) <country code> --country [-f=<format>]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-f' => /* @text */'Format of displayed data. Allowed values: print-r, var-export, var-dump, json, table [default: table]',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '--state' => /* @text */'Specifies that a country state ID used instead of city ID',
        '--country' => /* @text */'Specifies that a country code used instead of city ID',
    )
);
