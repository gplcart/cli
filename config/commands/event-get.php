<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'eget',
    'access' => 'admin',
    'description' => 'Display logged system events', // @text
    'usage' => array(
        'php gplcart (event-get | eget) -h',
        'php gplcart (event-get | eget) [-l=<offset,limit> -f=<format> -u=<int>]',
        'php gplcart (event-get | eget) --severity=<severity> [-l=<offset,limit> -f=<format> -u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '-u' => 'Current user ID for access control', // @text
        '--severity' => 'Severity of displayed events: info, danger, warning' // @text
    )
);
