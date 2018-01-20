<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'uup',
    'description' => /* @text */'Update user',
    'usage' => array(
        'gplcart (user-update | uup) -h',
        'gplcart (user-update | uup) <user id> (--name=<name> | --password=<password> | --email=<email>
        | --status=<bool> | --store_id=<integer> | --role_id=<integer> | --timezone=<string> | --data=<json>)'
    ),
    'options' => array(
        '--name' => /* @text */'Name',
        '--password' => /* @text */'Password',
        '--email' => /* @text */'E-mail',
        '--status' => /* @text */'Status',
        '--store_id' => /* @text */'Store ID',
        '--role_id' => /* @text */'Role ID',
        '--timezone' => /* @text */'Timezone',
        '--data' => /* @text */'Data',
        '-h' => /* @text */'Show command help'
    )
);
