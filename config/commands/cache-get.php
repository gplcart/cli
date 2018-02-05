<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'chget',
    'description' => 'Display cached data', // @text
    'usage' => array(
        'gplcart (cache-get | chget) -h',
        'gplcart (cache-get | chget) <cache id> [-f=<format>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]' // @text
    )
);
