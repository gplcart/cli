<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'udel',
    'description' => /* @text */'Delete one or several users',
    'usage' => array(
        'gplcart (user-delete | udel) -h',
        'gplcart (user-delete | udel) <user id>',
        'gplcart (user-delete | udel) <role id> --role',
        'gplcart (user-delete | udel) <store id> --store'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-store' => /* @text */'Specifies that a store ID used instead of user ID. All users associated with the store will be deleted',
        '-role' => /* @text */'Specifies that a user role ID used instead of user ID. All users associated with the role will be deleted'
    )
);
