<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cset',
    'access' => GC_PERM_SUPERADMIN,
    'description' => 'Set configuration option', // @text
    'usage' => array(
        'gplcart (config-set | cset) -h',
        'gplcart (config-set | cset) <id> <value> [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
    )
);
