<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'soff',
    'description' => 'Disable one or several stores', // @text
    'usage' => array(
        'gplcart (store-off | soff) -h',
        'gplcart (store-off | soff) --all',
        'gplcart (store-off | soff) <store id>'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--all' => 'Disable ALL stores if no ID specified' // @text
    )
);
