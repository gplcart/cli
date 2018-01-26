<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cladd',
    'description' => /* @text */'Add collection',
    'usage' => array(
        'gplcart (collection-add | cladd) -h',
        'gplcart (collection-add | cladd)',
        'gplcart (collection-add | cladd) (--title=<varchar> --type=<varchar>
        --description=<text> --store_id=<int>) [--status=<boolean>]',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--store_id' => /* @text */'Store ID',
        '--type' => /* @text */'Collection type',
        '--title' => /* @text */'Collection title',
        '--status' => /* @text */'Status' . ' [default: 0]',
        '--description' => /* @text */'Description' . ' [default: ]'
    )
);
