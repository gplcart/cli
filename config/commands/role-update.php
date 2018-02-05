<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'rup',
    'description' => 'Update user role', // @text
    'usage' => array(
        'gplcart (role-update | rup) -h',
        'gplcart (role-update | rup) <role id> (--name=<varchar> | --permissions=<varchar> | --status=<bool> | --redirect=<varchar>)'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--name' => 'Name', // @text
        '--permissions' => 'One or several permissions separated by pipe', // @text
        '--status' => 'Status', // @text
        '--redirect' => 'Redirect' // @text
    )
);
