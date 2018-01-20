<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cac',
    'description' => /* @text */'Clear cache',
    'usage' => array(
        'gplcart (cache-clear | cac) -h',
        'gplcart (cache-clear | cac) --all',
        'gplcart (cache-clear | cac) <cache id or pattern> [--pattern=<pattern>]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--all' => /* @text */'Delete all system cache',
        '--pattern' => /* @text */'Additional suffix with a glob pattern'
    )
);
