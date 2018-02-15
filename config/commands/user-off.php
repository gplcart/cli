<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'uoff',
    'access' => 'user_edit',
    'description' => 'Disable one or several users', // @text
    'usage' => array(
        'gplcart (user-off | uoff) -h',
        'gplcart (user-off | uoff) --all [-u=<int>]',
        'gplcart (user-off | uoff) <user id> [-u=<int>]',
        'gplcart (user-off | uoff) <role id> --role [-u=<int>]',
        'gplcart (user-off | uoff) <store id> --store [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '-all' => 'Disable ALL user if no ID argument specified', // @text
        '-store' => 'Disable ALL users with the store ID argument', // @text
        '-role' => 'Disable ALL users with the role ID argument' // @text
    )
);
