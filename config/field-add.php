<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'fdadd',
    'description' => /* @text */'Add field',
    'usage' => array(
        'gplcart (field-add | fdadd) -h',
        'gplcart (field-add | fdadd)',
        'gplcart (field-add | fdadd) (--title=<varchar> --type=<varchar> --widget=<varchar>) [--status=<boolean>]',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--title' => /* @text */'Title',
        '--type' => /* @text */'Type',
        '--widget' => /* @text */'Widget',
        '--status' => /* @text */'Enable / disable for customers [default: 0]'
    )
);
