<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'aup',
    'access' => 'admin',
    'description' => 'Update address', // @text
    'usage' => array(
        'gplcart (address-update | aup) -h',
        'gplcart (address-update | aup) <address id> (--user_id=<varchar> | --state_id=<int> | --country=<varchar> |
         --city_id=<varchar> | --address_1=<varchar> | --address_2=<varchar> | --phone=<varchar> | --fax=<varchar> |
         --type=<varchar> | --first_name=<varchar> | --middle_name=<varchar> | --last_name=<varchar> |
         --postcode=<varchar> | --company=<varchar> | --data=<varchar>) [-u=<integer>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--user_id' => 'User ID', // @text
        '--state_id' => 'Country state ID', // @text
        '--country' => 'County code', // @text
        '--city_id' => 'City ID', // @text
        '--address_1' => 'Address', // @text
        '--address_2' => 'Additional address', // @text
        '--phone' => 'Phone', // @text
        '--type' => 'Address type', // @text
        '--first_name' => 'First name', // @text
        '--middle_name' => 'Middle name', // @text
        '--last_name' => 'Last name', // @text
        '--postcode' => 'Phone', // @text
        '--company' => 'Company', // @text
        '--data' => 'JSON or base64 encoded JSON string' // @text
    )
);
