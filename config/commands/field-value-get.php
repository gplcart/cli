<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'fvget',
    'description' => 'Display one or several field values', // @text
    'usage' => array(
        'gplcart (field-value-get | fvget) -h',
        'gplcart (field-value-get | fvget) [-f=<format> -l=<offset,limit>]',
        'gplcart (field-value-get | fvget) <field value id> [-f=<format>]',
        'gplcart (field-value-get | fvget) <field id> --field [-f=<format> -l=<offset,limit>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '--field' => 'Display all field values with the field ID argument' // @text
    )
);
