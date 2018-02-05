<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'ciup',
    'description' => 'Update city', // @text
    'usage' => array(
        'gplcart (city-update | ciup) -h',
        'gplcart (city-update | ciup) <city id> (--name=<varchar> | --state_id=<int> | --country=<varchar>
        | --status=<bool> | --zone_id=<int>)'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--name' => 'Name', // @text
        '--zone_id' => 'Zone ID', // @text
        '--country' => 'County code', // @text
        '--state_id' => 'Country state ID', // @text
        '--status' => 'Status' // @text
    )
);
