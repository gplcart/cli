<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'zdel',
    'description' => 'Delete one or all zones', // @text
    'usage' => array(
        'gplcart (zone-delete | zdel) -h',
        'gplcart (zone-delete | zdel) --all',
        'gplcart (zone-delete | zdel) <zone id>'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--all' => 'Delete ALL zones if no ID specified', // @text
    )
);
