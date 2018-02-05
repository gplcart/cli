<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'fdel',
    'description' => 'Delete one or several files', // @text
    'usage' => array(
        'gplcart (file-delete | fdel) -h',
        'gplcart (file-delete | fdel) --all [--disk]',
        'gplcart (file-delete | fdel) <file id> [--disk]',
        'gplcart (file-delete | fdel) <file type> --type [--disk]',
        'gplcart (file-delete | fdel) <mime type> --mime [--disk]',
        'gplcart (file-delete | fdel) <entity name> --entity [--disk]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--all' => 'Delete ALL files if no ID argument specified', // @text
        '--type' => 'Delete ALL files with the type argument', // @text
        '--mime' => 'Delete ALL files with the MIME type argument', // @text
        '--entity' => 'Delete ALL files with the entity name argument', // @text
        '--disk' => 'Delete also the corresponding file from disk' // @text
    )
);
