<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'fvadd',
    'description' => /* @text */'Add field value',
    'usage' => array(
        'gplcart (field-value-add | fvadd) -h',
        'gplcart (field-value-add | fvadd)',
        'gplcart (field-value-add | fvadd) (--title=<varchar> --field_id=<int>) [--color=<varchar> --weight=<varchar>]',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--title' => /* @text */'Title',
        '--field_id' => /* @text */'Field ID',
        '--color' => /* @text */'HEX color code [default: ]',
        '--weight' => /* @text */'Position in lists [default: 0]',
    )
);
