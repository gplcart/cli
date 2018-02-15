<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'radd',
    'access' => 'user_role_add',
    'description' => 'Add user role', // @text
    'usage' => array(
        'gplcart (role-add | radd) -h',
        'gplcart (role-add | radd)',
        'gplcart (role-add | radd) (--name=<name> --permissions=<permission1|permission2>) [options]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--name' => 'Name', // @text
        '--permissions' => 'One or several permissions separated by pipe', // @text
        '--status' => 'Status', // @text
        '--redirect' => 'Redirect' // @text
    )
);
