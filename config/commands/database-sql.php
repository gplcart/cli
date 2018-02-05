<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'dbs',
    'description' => 'Perform SQL query', // @text
    'usage' => array(
        'gplcart (database-sql | dbs) -h',
        'gplcart (database-sql | dbs) <sql> [--fetch]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '--fetch' => 'Fetch results' // @text
    )
);
