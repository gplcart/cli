<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pcadd',
    'description' => /* @text */'Add product class',
    'usage' => array(
        'gplcart (product-class-add | pcadd) -h',
        'gplcart (product-class-add | pcadd)',
        'gplcart (product-class-add | pcadd) --title=<varchar> [--status=<bool>]',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--title' => /* @text */'Title',
        '--status' => /* @text */'Status' . ' [default: 0]'
    )
);
