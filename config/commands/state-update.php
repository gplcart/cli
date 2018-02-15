<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'csup',
    'access' => 'state_edit',
    'description' => 'Update country state', // @text
    'usage' => array(
        'gplcart (state-update | csup) -h',
        'gplcart (state-update | csup) <state id> (--code=<varchar> | --status=<bool>
        | --name=<varchar> | --country=<varchar> | --zone_id=<int>) [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--code' => 'Code', // @text
        '--name' => 'Name', // @text
        '--country' => 'Country code', // @text
        '--status' => 'Status', // @text
        '--zone_id' => 'Zone ID', // @text

    )
);
