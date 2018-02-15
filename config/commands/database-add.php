<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'dbadd',
    'access' => GC_PERM_SUPERADMIN,
    'description' => 'Insert database record', // @text
    'usage' => array(
        'gplcart (database-add | dbadd) -h',
        'gplcart (database-add | dbadd) <table name> (--key1=<value1> | --key2=<value2> ...) [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
    )
);
