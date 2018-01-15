<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'dbt',
    'description' => /* @text */'Truncate one or several tables',
    'usage' => array(
        'gplcart (database-truncate | dbt) -h',
        'gplcart (database-truncate | dbt) --all',
        'gplcart (database-truncate | dbt) <table name> <table name> ...'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--all' => /* @text */'Truncate all tables in the database'
    )
);
