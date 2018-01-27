<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'edel',
    'description' => /* @text */'Delete logged system events',
    'usage' => array(
        'gplcart (event-delete | edel) -h',
        'gplcart (event-delete | edel) [--expired]'
    ),
    'options' => array(
        '-h' => /* @text */'Display help message',
        '--expired' => /* @text */'Delete only expired records'
    )
);
