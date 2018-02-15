<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'dbdel',
    'access' => GC_PERM_SUPERADMIN,
    'description' => 'Delete database record', // @text
    'usage' => array(
        'gplcart (database-delete | dbdel) -h',
        'gplcart (database-delete | dbdel) <table name> (--column=<condition value> ...) [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
    )
);
