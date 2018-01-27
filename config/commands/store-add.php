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
        'gplcart (store-add | sadd) (--name=<varchar> --domain=<varchar> --data=<varchar>) [--basepath=<varchar> --status=<bool>]',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--name' => /* @text */'Name',
        '--data' => /* @text */'JSON or base64 encoded JSON string',
        '--basepath' => /* @text */'Path' . ' [default: ]',
        '--status' => /* @text */'Status' . ' [default: 0]',
        '--domain' => /* @text */'Domain or IP address without scheme'
    )
);
