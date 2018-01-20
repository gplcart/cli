<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'uoff',
    'description' => /* @text */'Disable one or several users',
    'usage' => array(
        'gplcart (user-off | uoff) -h',
        'gplcart (user-off | uoff) --all',
        'gplcart (user-off | uoff) <user id>',
        'gplcart (user-off | uoff) <role id> --role',
        'gplcart (user-off | uoff) <store id> --store'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-all' => /* @text */'Disable all existing users',
        '-store' => /* @text */'Specifies that a store ID used instead of user ID. All users associated with the store will be disabled',
        '-role' => /* @text */'Specifies that a user role ID used instead of user ID. All users associated with the role will be disabled'
    )
);
