<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'dbs',
    'description' => /* @text */'Perform SQL query',
    'usage' => array(
        'gplcart (database-sql | dbs) -h',
        'gplcart (database-sql | dbs) <sql> [--fetch]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '-f' => /* @text */'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]',
        '--fetch' => /* @text */'Fetch results'
    )
);
