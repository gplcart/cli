<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cget',
    'description' => 'Display one or several configuration options', // @text
    'usage' => array(
        'gplcart (config-get | cget) -h',
        'gplcart (config-get | cget) [-f=<format> -l=<offset,limit>]',
        'gplcart (config-get | cget) <id> [-f=<format>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]' // @text
    )
);
