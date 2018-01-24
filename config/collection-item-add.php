<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cliadd',
    'description' => /* @text */'Add collection item',
    'usage' => array(
        'gplcart (collection-item-add | cliadd) -h',
        'gplcart (collection-item-add | cliadd)',
        'gplcart (collection-item-add | cliadd) (--collection_id=<int> --entity_id=<int>) [--weight=<int> --status=<bool> --data=<json>]',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--entity_id' => /* @text */'Entity ID',
        '--collection_id' => /* @text */'Collection ID',
        '--weight' => /* @text */'Position in lists [default: 0]',
        '--status' => /* @text */'Enable / disable for customers [default: 0]',
        '--data' => /* @text */'JSON string'
    )
);
