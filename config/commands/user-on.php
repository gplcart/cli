<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'uon',
    'access' => 'user_edit',
    'description' => 'Enable one or several users', // @text
    'usage' => array(
        'gplcart (user-on | uon) -h',
        'gplcart (user-on | uon) --all [-u=<int>]',
        'gplcart (user-on | uon) <user id> [-u=<int>]',
        'gplcart (user-on | uon) <role id> --role [-u=<int>]',
        'gplcart (user-on | uon) <store id> --store [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '-all' => 'Enable ALL users if no ID argument specified', // @text
        '-store' => 'Enable ALL users with the store ID argument', // @text
        '-role' => 'Enable ALL users with the role ID argument' // @text
    )
);
