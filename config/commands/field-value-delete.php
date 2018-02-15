<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'fvdel',
    'access' => 'field_value_delete',
    'description' => 'Delete one or several field values', // @text
    'usage' => array(
        'gplcart (field-value-delete | fvdel) -h',
        'gplcart (field-value-delete | fvdel) <field value id> [-u=<int>]',
        'gplcart (field-value-delete | fvdel) <field id> --field [-u=<int>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--field' => 'Delete ALL field values with the field ID argument' // @text
    )
);
