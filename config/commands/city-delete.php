<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cidel',
    'description' => 'Delete one or several cities', // @text
    'usage' => array(
        'gplcart (city-delete | cidel) -h',
        'gplcart (city-delete | cidel) <city id>',
        'gplcart (city-delete | cidel) <country code> --country',
        'gplcart (city-delete | cidel) <country state id> --state'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--country' => 'Delete ALL cities with the country code argument', // @text
        '--state' => 'Delete ALL cities with the country state ID argument' // @text
    )
);
