<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'dbd',
    'description' => /* @text */'Drop (delete) one or several tables',
    'usage' => array(
        'gplcart (database-drop | dbd) -h',
        'gplcart (database-drop | dbd) --all',
        'gplcart (database-drop | dbd) <table name> <table name> ...'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--all' => /* @text */'Drop ALL tables in the database'
    )
);
