<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'clidel',
    'access' => 'collection_item_delete',
    'description' => 'Delete one or several collection items', // @text
    'usage' => array(
        'gplcart (collection-item-delete | clidel) -h',
        'gplcart (collection-item-delete | clidel) <collection item id> [-u=<int>]',
        'gplcart (collection-item-delete | clidel) <collection id> --collection [-u=<int>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--collection' => 'Delete ALL collection items with the collection ID argument' // @text
    )
);
