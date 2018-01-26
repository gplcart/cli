<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'fddel',
    'description' => /* @text */'Delete one or several fields',
    'usage' => array(
        'gplcart (field-delete | fddel) -h',
        'gplcart (field-delete | fddel) --all',
        'gplcart (field-delete | fddel) <field id>',
        'gplcart (field-delete | fddel) <type> --type',
        'gplcart (field-delete | fddel) <widget> --widget',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--all' => /* @text */'Delete ALL fields if not ID argument specified',
        '--type' => /* @text */'Delete ALL fields with the type argument',
        '--widget' => /* @text */'Delete ALL fields with the widget argument'
    )
);
