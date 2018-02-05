<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'fvadd',
    'description' => 'Add field value', // @text
    'usage' => array(
        'gplcart (field-value-add | fvadd) -h',
        'gplcart (field-value-add | fvadd)',
        'gplcart (field-value-add | fvadd) (--title=<varchar> --field_id=<int>) [--color=<varchar> --weight=<int>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--title' => 'Title', // @text
        '--field_id' => 'Field ID', // @text
        '--color' => 'Color', // @text
        '--weight' => 'Weight', // @text
    )
);
