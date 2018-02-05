<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'sadd',
    'description' => 'Add store', // @text
    'usage' => array(
        'gplcart (store-add | sadd) -h',
        'gplcart (store-add | sadd)',
        'gplcart (store-add | sadd) (--name=<varchar> --domain=<varchar> --data=<varchar>) [--basepath=<varchar> --status=<bool>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--name' => 'Name', // @text
        '--data' => 'JSON or base64 encoded JSON string', // @text
        '--basepath' => 'Path', // @text
        '--status' => 'Status', // @text
        '--domain' => 'Domain or IP address without scheme' // @text
    )
);
