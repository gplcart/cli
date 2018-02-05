<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cliup',
    'description' => 'Update collection item', // @text
    'usage' => array(
        'gplcart (collection-item-update | cliup) -h',
        'gplcart (collection-item-update | cliup)',
        'gplcart (collection-item-update | cliup) <collection item id>
        (--collection_id=<int> | --entity_id=<int> | --weight=<int> | --status=<bool> | --data=<json>)',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--entity_id' => 'Entity ID', // @text
        '--collection_id' => 'Collection ID', // @text
        '--weight' => 'Weight', // @text
        '--status' => 'Status', // @text
        '--data' => 'JSON or base64 encoded JSON string' // @text
    )
);
