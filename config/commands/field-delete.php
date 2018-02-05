<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'fddel',
    'description' => 'Delete one or several fields', // @text
    'usage' => array(
        'gplcart (field-delete | fddel) -h',
        'gplcart (field-delete | fddel) --all',
        'gplcart (field-delete | fddel) <field id>',
        'gplcart (field-delete | fddel) <type> --type',
        'gplcart (field-delete | fddel) <widget> --widget',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--all' => 'Delete ALL fields if not ID argument specified', // @text
        '--type' => 'Delete ALL fields with the type argument', // @text
        '--widget' => 'Delete ALL fields with the widget argument' // @text
    )
);
