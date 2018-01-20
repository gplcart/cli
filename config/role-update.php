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
        'gplcart (role-update | rup) <role id> (--name=<name> | --permissions=<permission1|permission2> | --status=<bool> | --redirect=<path>)'
    ),
    'options' => array(
        '--name' => /* @text */'Role name',
        '--permissions' => /* @text */'One or several permissions separated by delimiter',
        '--status' => /* @text */'Enable / disable [default: 0]',
        '--redirect' => /* @text */'User redirect [default: ]',
        '-h' => /* @text */'Show command help'
    )
);
