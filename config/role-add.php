<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'radd',
    'description' => /* @text */'Add user role',
    'usage' => array(
        'gplcart (role-add | radd) -h',
        'gplcart (role-add | radd)',
        'gplcart (role-add | radd) (--name=<name> --permissions=<permission1|permission2>) [options]',
    ),
    'options' => array(
        '--name' => /* @text */'Role name',
        '--permissions' => /* @text */'One or several permissions separated by delimiter',
        '--status' => /* @text */'Enable / disable [default: 0]',
        '--redirect' => /* @text */'User redirect [default: ]',
        '-h' => /* @text */'Show command help'
    )
);
