<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'rup',
    'description' => /* @text */'Update user role',
    'usage' => array(
        'gplcart (role-update | rup) -h',
        'gplcart (role-update | rup) <role id> (--name=<varchar> | --permissions=<varchar> | --status=<bool> | --redirect=<varchar>)'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--name' => /* @text */'Role name',
        '--permissions' => /* @text */'One or several permissions separated by pipe',
        '--status' => /* @text */'Status' . ' [default: 0]',
        '--redirect' => /* @text */'Redirect' . ' [default: ]'
    )
);
