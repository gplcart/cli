<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'son',
    'description' => 'Enable one or several stores', // @text
    'usage' => array(
        'gplcart (store-on | son) -h',
        'gplcart (store-on | son) --all',
        'gplcart (store-on | son) <store id>'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--all' => 'Enable ALL stores if no store ID specified' // @text
    )
);
