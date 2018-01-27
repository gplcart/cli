<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'zdel',
    'description' => /* @text */'Delete one or all zones',
    'usage' => array(
        'gplcart (zone-delete | zdel) -h',
        'gplcart (zone-delete | zdel) --all',
        'gplcart (zone-delete | zdel) <zone id>'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--all' => /* @text */'Delete ALL zones if no ID specified',
    )
);
