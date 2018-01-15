<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'ladd',
    'description' => /* @text */'Add language',
    'usage' => array(
        'gplcart (language-add | ladd) -h',
        'gplcart (language-add | ladd)',
        'gplcart (language-add | ladd) (--code=<code>) [options]'
    ),
    'options' => array(
        '--code' => /* @text */'Language code',
        '--name' => /* @text */'Language name [default: ]',
        '--native_name' => /* @text */'Language native name [default: ]',
        '--status' => /* @text */'Enable / disable for customers [default: 0]',
        '--default' => /* @text */'Set default [default: 0]',
        '--weight' => /* @text */'Position in lists [default: 0]',
        '--rtl' => /* @text */'Set right-to-left script [default: 0]',
        '-h' => /* @text */'Show command help'
    )
);
