<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'fdget',
    'description' => 'Display one or several fields', // @text
    'usage' => array(
        'gplcart (field-get | fdget) -h',
        'gplcart (field-get | fdget) [-f=<format> -l=<offset,limit>]',
        'gplcart (field-get | fdget) <field id> [-f=<format>]',
        'gplcart (field-get | fdget) <type> --type [-f=<format> -l=<offset,limit>]',
        'gplcart (field-get | fdget) <widget> --widget [-f=<format> -l=<offset,limit>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '--widget' => 'Display all fields with the widget argument', // @text
        '--type' => 'Display all fields with the type arguments' // @text
    )
);
