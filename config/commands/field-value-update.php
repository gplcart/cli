<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'fvup',
    'access' => 'field_value_edit',
    'description' => 'Update field value', // @text
    'usage' => array(
        'gplcart (field-value-update | fvup) -h',
        'gplcart (field-value-update | fvup) <field value id> (--title=<varchar> | --field_id=<int>
        | --color=<varchar> | --weight=<int>) [-u=<int>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--title' => 'Title', // @text
        '--field_id' => 'Field ID', // @text
        '--color' => 'Color', // @text
        '--weight' => 'Weight', // @text
    )
);
