<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'zadd',
    'description' => /* @text */'Add zone',
    'usage' => array(
        'gplcart (zone-add | zadd) -h',
        'gplcart (zone-add | zadd)',
        'gplcart (zone-add | zadd) --title=<title> [--status=<boolean>]',
    ),
    'options' => array(
        '--title' => /* @text */'Zone name',
        '--status' => /* @text */'Enable / disable for customers [default: 0]',
        '-h' => /* @text */'Show command help'
    )
);
