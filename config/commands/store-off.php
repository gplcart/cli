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
        '-h' => /* @text */'Show command help',
        '--all' => /* @text */'Disable ALL stores if no ID specified'
    )
);
