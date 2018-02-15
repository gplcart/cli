<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cliadd',
    'access' => 'collection_item_add',
    'description' => 'Add collection item',
    'usage' => array(
        'gplcart (collection-item-add | cliadd) -h',
        'gplcart (collection-item-add | cliadd) [-u=<int>]',
        'gplcart (collection-item-add | cliadd) (--collection_id=<int> --entity_id=<int>)
         [--weight=<int> --status=<bool> --data=<varchar> -u=<int>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--entity_id' => 'Entity ID', // @text
        '--collection_id' => 'Collection ID', // @text
        '--weight' => 'Weight', // @text
        '--status' => 'Status', // @text
        '--data' => 'JSON or base64 encoded JSON string' // @text
    )
);
