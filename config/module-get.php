<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 *
 */
return array(
    'alias' => 'mget',
    'description' => /* @text */'Display one or several modules',
    'usage' => array(
        'gplcart (module-get | mget) -h',
        'gplcart (module-get | mget) [-f=<format> -l=<number>]',
        'gplcart (module-get | mget) <module id> [-f=<format>]'
    ),
    'options' => array(
        '-f' => /* @text */'Format of displayed data. Allowed values: print-r, var-export, var-dump, json, table [default: table]',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '-h' => /* @text */'Show command help'
    )
);
