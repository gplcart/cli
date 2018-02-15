<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'mu',
    'access' => 'module_uninstall',
    'description' => 'Uninstall module', // @text
    'usage' => array(
        'gplcart (module-uninstall | mu) -h',
        'gplcart (module-uninstall | mu) <module id> [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
    )
);
