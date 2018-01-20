<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'rpa',
    'description' => /* @text */'Add one or several permissions to a user role',
    'usage' => array(
        'gplcart (role-perm-add | rpa) -h',
        'gplcart (role-perm-add | rpa) <role id> <permission1> <permission2> ...'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help'
    )
);
