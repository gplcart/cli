<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'fdget',
    'access' => 'field',
    'description' => 'Display one or several fields', // @text
    'usage' => array(
        'gplcart (field-get | fdget) -h',
        'gplcart (field-get | fdget) [-f=<format> -l=<offset,limit> -u=<int>]',
        'gplcart (field-get | fdget) <field id> [-f=<format> -u=<int>]',
        'gplcart (field-get | fdget) <type> --type [-f=<format> -l=<offset,limit> -u=<int>]',
        'gplcart (field-get | fdget) <widget> --widget [-f=<format> -l=<offset,limit> -u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '-u' => 'Current user ID for access control', // @text
        '--widget' => 'Display all fields with the widget argument', // @text
        '--type' => 'Display all fields with the type arguments' // @text
    )
);
