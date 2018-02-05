<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'edel',
    'description' => 'Delete logged system events', // @text
    'usage' => array(
        'gplcart (event-delete | edel) -h',
        'gplcart (event-delete | edel) [--expired]'
    ),
    'options' => array(
        '-h' => 'Display help message', // @text
        '--expired' => 'Delete only expired records' // @text
    )
);
