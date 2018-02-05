<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'uoff',
    'description' => 'Disable one or several users', // @text
    'usage' => array(
        'gplcart (user-off | uoff) -h',
        'gplcart (user-off | uoff) --all',
        'gplcart (user-off | uoff) <user id>',
        'gplcart (user-off | uoff) <role id> --role',
        'gplcart (user-off | uoff) <store id> --store'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-all' => 'Disable ALL user if no ID argument specified', // @text
        '-store' => 'Disable ALL users with the store ID argument', // @text
        '-role' => 'Disable ALL users with the role ID argument' // @text
    )
);
