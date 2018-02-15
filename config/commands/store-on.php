<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'son',
    'access' => 'store_edit',
    'description' => 'Enable one or several stores', // @text
    'usage' => array(
        'gplcart (store-on | son) -h',
        'gplcart (store-on | son) --all [-u=<int>]',
        'gplcart (store-on | son) <store id> [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--all' => 'Enable ALL stores if no store ID specified' // @text
    )
);
