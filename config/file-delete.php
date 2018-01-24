<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'fdel',
    'description' => /* @text */'Delete one or several files',
    'usage' => array(
        'gplcart (file-delete | fdel) -h',
        'gplcart (file-delete | fdel) --all [--disk]',
        'gplcart (file-delete | fdel) <file id> [--disk]',
        'gplcart (file-delete | fdel) <file type> --type [--disk]',
        'gplcart (file-delete | fdel) <mime type> --mime [--disk]',
        'gplcart (file-delete | fdel) <entity name> --entity [--disk]',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--all' => /* @text */'Delete all files',
        '--disk' => /* @text */'Delete both from database and disk',
        '--type' => /* @text */'Specifies that a file type used instead of file ID',
        '--mime' => /* @text */'Specifies that a file MIME type used instead of file ID',
        '--entity' => /* @text */'Specifies that an entity name used instead of file ID'
    )
);
