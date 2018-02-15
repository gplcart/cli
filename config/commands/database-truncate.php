<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'dbt',
    'access' => GC_PERM_SUPERADMIN,
    'description' => 'Truncate (empty) one or several tables', // @text
    'usage' => array(
        'gplcart (database-truncate | dbt) -h',
        'gplcart (database-truncate | dbt) --all [-u=<int>]',
        'gplcart (database-truncate | dbt) <table name> <table name> ... [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--all' => 'Truncate ALL tables in the database' // @text
    )
);
