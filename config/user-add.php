<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'uadd',
    'description' => /* @text */'Add user',
    'usage' => array(
        'gplcart (user-add | uadd) -h',
        'gplcart (user-add | uadd)',
        'gplcart (user-add | uadd) (--email=<email> --password=<password> --name=<name>) [options]',
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
