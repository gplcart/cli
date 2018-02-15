<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'udel',
    'access' => 'user_delete',
    'description' => 'Delete one or several users', // @text
    'usage' => array(
        'gplcart (user-delete | udel) -h',
        'gplcart (user-delete | udel) <user id> [-u=<int>]',
        'gplcart (user-delete | udel) <role id> --role [-u=<int>]',
        'gplcart (user-delete | udel) <store id> --store [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '-role' => 'Delete ALL users with the role ID argument', // @text
        '-store' => 'Delete ALL users with the store ID argument' // @text
    )
);
