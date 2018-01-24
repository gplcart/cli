<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'fdget',
    'description' => /* @text */'Display one or several fields',
    'usage' => array(
        'gplcart (field-get | fdget) -h',
        'gplcart (field-get | fdget) [-f=<format> -l=<offset,limit>]',
        'gplcart (field-get | fdget) <field id> [-f=<format>]',
        'gplcart (field-get | fdget) <type> --type [-f=<format> -l=<offset,limit>]',
        'gplcart (field-get | fdget) <widget> --widget [-f=<format> -l=<offset,limit>]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-f' => /* @text */'Format of displayed data. Allowed values: print-r, var-export, var-dump, json, table [default: table]',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '--type' => /* @text */'Specifies that a field type used instead of field ID',
        '--widget' => /* @text */'Specifies that a widget name used instead of field ID'
    )
);
