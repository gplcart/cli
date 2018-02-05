<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'uadd',
    'description' => 'Add user', // @text
    'usage' => array(
        'gplcart (user-add | uadd) -h',
        'gplcart (user-add | uadd)',
        'gplcart (user-add | uadd) (--email=<varchar> --password=<varchar> --name=<varchar>) [options]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--name' => 'Name', // @text
        '--password' => 'Password', // @text
        '--email' => 'E-mail', // @text
        '--status' => 'Status', // @text
        '--store_id' => 'Store ID', // @text
        '--role_id' => 'Role', // @text
        '--timezone' => 'Timezone', // @text
        '--data' => 'JSON or base64 encoded JSON string' // @text
    )
);
