<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cidel',
    'access' => 'city_delete',
    'description' => 'Delete one or several cities', // @text
    'usage' => array(
        'gplcart (city-delete | cidel) -h',
        'gplcart (city-delete | cidel) <city id> [-u=<int>]',
        'gplcart (city-delete | cidel) <country code> --country [-u=<int>]',
        'gplcart (city-delete | cidel) <country state id> --state [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--country' => 'Delete ALL cities with the country code argument', // @text
        '--state' => 'Delete ALL cities with the country state ID argument' // @text
    )
);
