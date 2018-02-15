<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cliup',
    'access' => 'collection_item_edit',
    'description' => 'Update collection item', // @text
    'usage' => array(
        'gplcart (collection-item-update | cliup) -h',
        'gplcart (collection-item-update | cliup) [-u=<int>]',
        'gplcart (collection-item-update | cliup) <collection item id>
        (--collection_id=<int> | --entity_id=<int> | --weight=<int> | --status=<bool> | --data=<json>) [-u=<int>]',
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
