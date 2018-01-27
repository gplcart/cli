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
        '--all' => /* @text */'Delete ALL files if no ID argument specified',
        '--type' => /* @text */'Delete ALL files with the type argument',
        '--mime' => /* @text */'Delete ALL files with the MIME type argument',
        '--entity' => /* @text */'Delete ALL files with the entity name argument',
        '--disk' => /* @text */'Delete also the corresponding file from disk'
    )
);
