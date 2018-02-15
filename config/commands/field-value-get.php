<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'fvget',
    'access' => 'field_value',
    'description' => 'Display one or several field values', // @text
    'usage' => array(
        'gplcart (field-value-get | fvget) -h',
        'gplcart (field-value-get | fvget) [-f=<format> -l=<offset,limit> -u=<int>]',
        'gplcart (field-value-get | fvget) <field value id> [-f=<format> -u=<int>]',
        'gplcart (field-value-get | fvget) <field id> --field [-f=<format> -l=<offset,limit> -u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '-u' => 'Current user ID for access control', // @text
        '--field' => 'Display all field values with the field ID argument' // @text
    )
);
