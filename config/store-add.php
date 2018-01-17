<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'sadd',
    'description' => /* @text */'Add store',
    'usage' => array(
        'gplcart (store-add | sadd) -h',
        'gplcart (store-add | sadd)',
        'gplcart (store-add | sadd) (--name=<name> --domain=<domain or IP> --data=<json>) [--basepath=<domain path> --status=<boolean>]',
    ),
    'options' => array(
        '--name' => /* @text */'Store name',
        '--domain' => /* @text */'Store domain or IP address without scheme',
        '--data' => /* @text */'JSON string with an array of store data',
        '--basepath' => /* @text */'Domain path [default: ]',
        '--status' => /* @text */'Enable / disable [default: 0]',
        '-h' => /* @text */'Show command help'
    )
);
