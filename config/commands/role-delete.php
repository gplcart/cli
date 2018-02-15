<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'rdel',
    'access' => 'user_role_delete',
    'description' => 'Delete one or several roles', // @text
    'usage' => array(
        'gplcart (role-delete | rdel) -h',
        'gplcart (role-delete | rdel) --all [-u=<int>]',
        'gplcart (role-delete | rdel) <role id> [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--all' => 'Delete ALL user roles if no ID specified', // @text
    )
);
