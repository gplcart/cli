<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'zup',
    'access' => 'zone_edit',
    'description' => 'Update zone', // @text
    'usage' => array(
        'gplcart (zone-update | zup) -h',
        'gplcart (zone-update | zup) <zone id> (--status=<bool> | --title=<varchar>) [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--title' => 'Title', // @text
        '--status' => 'Status', // @text
    )
);
