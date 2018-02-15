<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'ladd',
    'access' => 'language_add',
    'description' => 'Add language', // @text
    'usage' => array(
        'gplcart (language-add | ladd) -h',
        'gplcart (language-add | ladd)',
        'gplcart (language-add | ladd) (--code=<code>) [options]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--code' => 'Code', // @text
        '--name' => 'Name', // @text
        '--native_name' => 'Native name', // @text
        '--status' => 'Status', // @text
        '--default' => 'Default', // @text
        '--weight' => 'Weight', // @text
        '--rtl' => 'Right-to-left' // @text
    )
);
