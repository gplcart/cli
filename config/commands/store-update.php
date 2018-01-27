<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'sup',
    'description' => /* @text */'Update store',
    'usage' => array(
        'gplcart (store-update | sup) -h',
        'gplcart (store-update | sup) (--name=<varchar> | --domain=<varchar> | --data=<varchar>
        | --basepath=<varchar> | --status=<bool>)',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--name' => /* @text */'Name',
        '--domain' => /* @text */'Domain or IP address without scheme',
        '--data' => /* @text */'JSON or base64 encoded JSON string',
        '--basepath' => /* @text */'Path',
        '--status' => /* @text */'Status'
    )
);
