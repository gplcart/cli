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
        'gplcart (module-get | mget) [-f=<format> -l=<offset,limit>]',
        'gplcart (module-get | mget) <module id> [-f=<format>]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '-f' => /* @text */'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]'
    )
);
