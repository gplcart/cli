<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'fvup',
    'description' => /* @text */'Update field value',
    'usage' => array(
        'gplcart (field-value-update | fvup) -h',
        'gplcart (field-value-update | fvup) <field value id> (--title=<varchar> | --field_id=<int> | --color=<varchar> | --weight=<varchar>)',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--title' => /* @text */'Title',
        '--field_id' => /* @text */'Field ID',
        '--color' => /* @text */'HEX color code',
        '--weight' => /* @text */'Position in lists',
    )
);
