<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'dbt',
    'description' => 'Truncate (empty) one or several tables', // @text
    'usage' => array(
        'gplcart (database-truncate | dbt) -h',
        'gplcart (database-truncate | dbt) --all',
        'gplcart (database-truncate | dbt) <table name> <table name> ...'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--all' => 'Truncate ALL tables in the database' // @text
    )
);
