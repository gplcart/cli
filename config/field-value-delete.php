<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'fvdel',
    'description' => /* @text */'Delete one or several field values',
    'usage' => array(
        'gplcart (field-value-delete | fvdel) -h',
        'gplcart (field-value-delete | fvdel) <field value id>',
        'gplcart (field-value-delete | fvdel) <field id> --field',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--field' => /* @text */'Specifies that a field ID used instead of field value ID'
    )
);
