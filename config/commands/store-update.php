<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'sup',
    'access' => 'store_edit',
    'description' => 'Update store', // @text
    'usage' => array(
        'gplcart (store-update | sup) -h',
        'gplcart (store-update | sup) (--name=<varchar> | --domain=<varchar> | --data=<varchar>
        | --basepath=<varchar> | --status=<bool>) [-u=<int>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--name' => 'Name', // @text
        '--domain' => 'Domain or IP address without scheme', // @text
        '--data' => 'JSON or base64 encoded JSON string', // @text
        '--basepath' => 'Path', // @text
        '--status' => 'Status' // @text
    )
);
