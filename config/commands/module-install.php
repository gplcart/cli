<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'mi',
    'access' => 'module_install',
    'description' => 'Install module', // @text
    'usage' => array(
        'gplcart (module-install | mi) -h',
        'gplcart (module-install | mi) <module id> [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
    )
);
