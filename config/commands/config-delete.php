<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cdel',
    'access' => GC_PERM_SUPERADMIN,
    'description' => 'Delete configuration option', // @text
    'usage' => array(
        'gplcart (config-delete | cdel) -h',
        'gplcart (config-delete | cdel) <id> [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
    )
);
