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
        'gplcart (city-get | ciget) [-f=<format> -l=<offset,limit>]',
        'gplcart (city-get | ciget) <city id> [-f=<format>]',
        'gplcart (city-get | ciget) <state id> --state [-f=<format> -l=<offset,limit>]',
        'gplcart (city-get | ciget) <country code> --country [-f=<format> -l=<offset,limit>]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '-f' => /* @text */'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]',
        '--state' => /* @text */'Delete ALL cities for the country state ID argument',
        '--country' => /* @text */'Delete ALL cities for the country code argument',
    )
);
