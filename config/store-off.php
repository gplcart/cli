<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'soff',
    'description' => /* @text */'Disable one or several stores',
    'usage' => array(
        'gplcart (store-off | soff) -h',
        'gplcart (store-off | soff) --all',
        'gplcart (store-off | soff) <store id>'
    ),
    'options' => array(
        '--all' => /* @text */'Disable all stores if no store ID specified',
        '-h' => /* @text */'Show command help'
    )
);
