<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'rpd',
    'access' => 'user_role_edit',
    'description' => 'Delete one or several permissions from a user role', // @text
    'usage' => array(
        'gplcart (role-perm-delete | rpd) -h',
        'gplcart (role-perm-delete | rpd) <role id> <permission1> <permission2> ... [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
    )
);
