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
        '-h' => /* @text */'Show command help',
        '--code' => /* @text */'Code',
        '--name' => /* @text */'Name' . ' [default: ]',
        '--native_name' => /* @text */'Native name' . ' [default: ]',
        '--status' => /* @text */'Status' . ' [default: 0]',
        '--default' => /* @text */'Default' . ' [default: 0]',
        '--weight' => /* @text */'Weight' . ' [default: 0]',
        '--rtl' => /* @text */'Right-to-left' . ' [default: 0]'
    )
);
