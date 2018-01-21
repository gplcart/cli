<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'chc',
    'description' => /* @text */'Clear cache',
    'usage' => array(
        'gplcart (cache-clear | chc) -h',
        'gplcart (cache-clear | chc) --all',
        'gplcart (cache-clear | chc) <cache id or pattern> [--pattern=<pattern>]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--all' => /* @text */'Delete all system cache',
        '--pattern' => /* @text */'Additional suffix with a glob pattern'
    )
);
