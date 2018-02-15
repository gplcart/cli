<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'rpa',
    'access' => 'user_role_edit',
    'description' => 'Add one or several permissions to a user role', // @text
    'usage' => array(
        'gplcart (role-perm-add | rpa) -h',
        'gplcart (role-perm-add | rpa) <role id> <permission1> <permission2> ... [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
    )
);
