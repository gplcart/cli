<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'zdel',
    'access' => 'zone_delete',
    'description' => 'Delete one or all zones', // @text
    'usage' => array(
        'gplcart (zone-delete | zdel) -h',
        'gplcart (zone-delete | zdel) --all [-u=<int>]',
        'gplcart (zone-delete | zdel) <zone id> [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--all' => 'Delete ALL zones if no ID specified', // @text
    )
);
