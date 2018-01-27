<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'chget',
    'description' => /* @text */'Display cached data',
    'usage' => array(
        'gplcart (cache-get | chget) -h',
        'gplcart (cache-get | chget) <cache id> [-f=<format>]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-f' => /* @text */'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]'
    )
);
