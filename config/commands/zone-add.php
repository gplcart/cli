<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'zadd',
    'access' => 'zone_add',
    'description' => 'Add zone', // @text
    'usage' => array(
        'gplcart (zone-add | zadd) -h',
        'gplcart (zone-add | zadd) [-u=<int>]',
        'gplcart (zone-add | zadd) --title=<varchar> [--status=<bool>] [-u=<int>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--title' => 'Name', // @text
        '--status' => 'Status' // @text
    )
);
