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
        'gplcart (store-update | sup) (--name=<name> | --domain=<domain or IP> | --data=<json> | --basepath=<domain path> | --status=<boolean>)',
    ),
    'options' => array(
        '--name' => /* @text */'Store name',
        '--domain' => /* @text */'Store domain or IP address without scheme',
        '--data' => /* @text */'JSON string with an array of store data',
        '--basepath' => /* @text */'Domain path',
        '--status' => /* @text */'Enable / disable',
        '-h' => /* @text */'Show command help'
    )
);
