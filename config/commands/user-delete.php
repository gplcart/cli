<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'udel',
    'description' => 'Delete one or several users', // @text
    'usage' => array(
        'gplcart (user-delete | udel) -h',
        'gplcart (user-delete | udel) <user id>',
        'gplcart (user-delete | udel) <role id> --role',
        'gplcart (user-delete | udel) <store id> --store'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-role' => 'Delete ALL users with the role ID argument', // @text
        '-store' => 'Delete ALL users with the store ID argument' // @text
    )
);
