<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'uup',
    'access' => 'user_edit',
    'description' => 'Update user', // @text
    'usage' => array(
        'gplcart (user-update | uup) -h',
        'gplcart (user-update | uup) <user id> (--name=<varchar> | --password=<varchar> | --email=<varchar>
        | --status=<bool> | --store_id=<int> | --role_id=<int> | --timezone=<varchar> | --data=<varchar>) [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--name' => 'Name', // @text
        '--password' => 'Password', // @text
        '--email' => 'E-mail', // @text
        '--status' => 'Status', // @text
        '--store_id' => 'Store ID', // @text
        '--role_id' => 'Role ID', // @text
        '--timezone' => 'Timezone', // @text
        '--data' => 'JSON or base64 encoded JSON string', // @text
    )
);
