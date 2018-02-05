<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'uon',
    'description' => 'Enable one or several users', // @text
    'usage' => array(
        'gplcart (user-on | uon) -h',
        'gplcart (user-on | uon) --all',
        'gplcart (user-on | uon) <user id>',
        'gplcart (user-on | uon) <role id> --role',
        'gplcart (user-on | uon) <store id> --store'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-all' => 'Enable ALL users if no ID argument specified', // @text
        '-store' => 'Enable ALL users with the store ID argument', // @text
        '-role' => 'Enable ALL users with the role ID argument' // @text
    )
);
