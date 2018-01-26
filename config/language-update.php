<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'lup',
    'description' => /* @text */'Update language',
    'usage' => array(
        'gplcart (language-update | lup) -h',
        'gplcart (language-update | lup) <language code> (--name=<varchar> | --native_name=<varchar> | --status=<bool>
        | --weight=<int> | --default=<bool> | --rtl=<bool>)'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--name' => /* @text */'Name',
        '--native_name' => /* @text */'Native name',
        '--status' => /* @text */'Status',
        '--default' => /* @text */'Default',
        '--weight' => /* @text */'Weight',
        '--rtl' => /* @text */'Right-to-left'
    )
);
