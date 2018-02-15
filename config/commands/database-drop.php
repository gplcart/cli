<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'dbd',
    'access' => GC_PERM_SUPERADMIN,
    'description' => 'Drop (delete) one or several database tables', // @text
    'usage' => array(
        'gplcart (database-drop | dbd) -h',
        'gplcart (database-drop | dbd) --all [-u=<int>]',
        'gplcart (database-drop | dbd) <table name> <table name> ... [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--all' => 'Drop ALL tables in the database', // @text
    )
);
