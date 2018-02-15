<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'coup',
    'access' => 'country_edit',
    'description' => 'Update country', // @text
    'usage' => array(
        'gplcart (country-update | coup) -h',
        'gplcart (country-update | coup) <country code> (--code=<varchar> | --status=<bool> | --name=<varchar>
        | --native_name=<varchar> | --zone_id=<int> | --weight=<int> | --format=<varchar>) [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--code' => 'Code', // @text
        '--name' => 'Name', // @text
        '--native_name' => 'Native name', // @text
        '--status' => 'Status', // @text
        '--zone_id' => 'Zone ID', // @text
        '--weight' => 'Weight', // @text
        '--format' => 'JSON or base64 encoded JSON string', // @text
    )
);
