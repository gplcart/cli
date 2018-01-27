<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'dbdel',
    'description' => /* @text */'Delete database record',
    'usage' => array(
        'gplcart (database-delete | dbdel) -h',
        'gplcart (database-delete | dbdel) <table name> (--column=<condition value> ...)'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help'
    )
);
