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
        'gplcart (language-update | lup) <language code> (--name=<name> | --native_name=<name> | --status=<boolean> | --weight=<integer> | --default=<boolean> | --rtl=<boolean>)'
    ),
    'options' => array(
        '--name' => /* @text */'Language name',
        '--native_name' => /* @text */'Language native name',
        '--status' => /* @text */'Enable / disable for customers',
        '--default' => /* @text */'Set default',
        '--weight' => /* @text */'Position in lists',
        '--rtl' => /* @text */'Set right-to-left script',
        '-h' => /* @text */'Show command help'
    )
);
