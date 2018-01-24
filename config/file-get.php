<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'fget',
    'description' => /* @text */'Display one or several files',
    'usage' => array(
        'gplcart (file-get | fget) -h',
        'gplcart (file-get | fget) [-f=<format> -l=<offset,limit>]',
        'gplcart (file-get | fget) <file id> [-f=<format>]',
        'gplcart (file-get | fget) <file type> --type [-f=<format> -l=<offset,limit>]',
        'gplcart (file-get | fget) <mime type> --mime [-f=<format> -l=<offset,limit>]',
        'gplcart (file-get | fget) <entity name> --entity [-f=<format> -l=<offset,limit>]',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-f' => /* @text */'Format of displayed data. Allowed values: print-r, var-export, var-dump, json, table [default: table]',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '--type' => /* @text */'Specifies that a file type used instead of file ID',
        '--mime' => /* @text */'Specifies that a file MIME type used instead of file ID',
        '--entity' => /* @text */'Specifies that an entity name used instead of file ID'
    )
);
