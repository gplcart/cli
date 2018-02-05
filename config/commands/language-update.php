<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'lup',
    'description' => 'Update language', // @text
    'usage' => array(
        'gplcart (language-update | lup) -h',
        'gplcart (language-update | lup) <language code> (--name=<varchar> | --native_name=<varchar> | --status=<bool>
        | --weight=<int> | --default=<bool> | --rtl=<bool>)'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--name' => 'Name', // @text
        '--native_name' => 'Native name', // @text
        '--status' => 'Status', // @text
        '--default' => 'Default', // @text
        '--weight' => 'Weight', // @text
        '--rtl' => 'Right-to-left' // @text
    )
);
