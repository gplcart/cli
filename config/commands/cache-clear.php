<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'chc',
    'access' => 'admin',
    'description' => 'Clear cache', // @text
    'usage' => array(
        'gplcart (cache-clear | chc) -h',
        'gplcart (cache-clear | chc) --all [-u=<integer>]',
        'gplcart (cache-clear | chc) <cache id or pattern> [--pattern=<pattern>] [-u=<integer>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--all' => 'Delete all system cache', // @text
        '--pattern' => 'Additional suffix with a glob pattern' // @text
    )
);
