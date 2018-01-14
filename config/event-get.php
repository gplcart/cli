<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'eget',
    'description' => /* @text */'Display logged system events',
    'usage' => array(
        'php gplcart (event-get | eget) -h',
        'php gplcart (event-get | eget) [--severity=<severity> -l=<number> -f=<format>]'
    ),
    'options' => array(
        '--severity' => /* @text */'Severity of displayed events. Allowed values: info, danger, warning',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '-f' => /* @text */'Format of displayed data. Allowed values: print-r, var-export, var-dump, json, table [default: table]',
        '-h' => /* @text */'Show command help'
    )
);
