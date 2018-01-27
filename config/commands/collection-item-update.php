<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cliup',
    'description' => /* @text */'Update collection item',
    'usage' => array(
        'gplcart (collection-item-update | cliup) -h',
        'gplcart (collection-item-update | cliup)',
        'gplcart (collection-item-update | cliup) <collection item id>
        (--collection_id=<int> | --entity_id=<int> | --weight=<int> | --status=<bool> | --data=<json>)',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--entity_id' => /* @text */'Entity ID',
        '--collection_id' => /* @text */'Collection ID',
        '--weight' => /* @text */'Weight' . ' [default: 0]',
        '--status' => /* @text */'Status' . ' [default: 0]',
        '--data' => /* @text */'JSON string'
    )
);
