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
        '-all' => /* @text */'Disable ALL user if no ID argument specified',
        '-store' => /* @text */'Disable ALL users with the store ID argument',
        '-role' => /* @text */'Disable ALL users with the role ID argument'
    )
);
