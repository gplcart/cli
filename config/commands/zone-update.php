<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'zup',
    'description' => /* @text */'Update zone',
    'usage' => array(
        'gplcart (zone-update | zup) -h',
        'gplcart (zone-update | zup) <zone id> (--status=<bool> | --title=<varchar>)'
    ),
    'options' => array(
        '--title' => /* @text */'Title',
        '--status' => /* @text */'Status',
        '-h' => /* @text */'Show command help'
    )
);
