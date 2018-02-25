<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'ciadd',
    'access' => 'city_add',
    'description' => 'Add city', // @text
    'usage' => array(
        'gplcart (city-add | ciadd) -h',
        'gplcart (city-add | ciadd)',
        'gplcart (city-add | ciadd)
        (--name=<varchar> --state_id=<int> --country=<varchar>) [--status=<bool> --zone_id=<int> -u=<int>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--name' => 'Name', // @text
        '--state_id' => 'Country state', // @text
        '--country' => 'County code', // @text
        '--status' => 'Status', // @text
        '--zone_id' => 'Zone' // @text
    )
);
