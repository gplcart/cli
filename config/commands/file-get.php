<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'fget',
    'description' => 'Display one or several files', // @text
    'usage' => array(
        'gplcart (file-get | fget) -h',
        'gplcart (file-get | fget) [-f=<format> -l=<offset,limit>]',
        'gplcart (file-get | fget) <file id> [-f=<format>]',
        'gplcart (file-get | fget) <file type> --type [-f=<format> -l=<offset,limit>]',
        'gplcart (file-get | fget) <mime type> --mime [-f=<format> -l=<offset,limit>]',
        'gplcart (file-get | fget) <entity name> --entity [-f=<format> -l=<offset,limit>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '--type' => 'Display all files with the type argument', // @text
        '--mime' => 'Display all files with the MIME type argument', // @text
        '--entity' => 'Display all files with the entity name argument' // @text
    )
);
