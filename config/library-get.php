<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 *
 */
return array(
    'alias' => 'liget',
    'description' => /* @text */'Display one or several libraries',
    'usage' => array(
        'gplcart (library-get | liget) -h',
        'gplcart (library-get | liget) [-f=<format> -l=<number>]',
        'gplcart (library-get | liget) <library id> [-f=<format>]'
    ),
    'options' => array(
        '-f' => /* @text */'Format of displayed data. Allowed values: print-r, var-export, var-dump, json, table [default: table]',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '-h' => /* @text */'Show command help'
    )
);
