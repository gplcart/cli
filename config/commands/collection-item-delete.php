<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'clidel',
    'description' => 'Delete one or several collection items', // @text
    'usage' => array(
        'gplcart (collection-item-delete | clidel) -h',
        'gplcart (collection-item-delete | clidel) <collection item id>',
        'gplcart (collection-item-delete | clidel) <collection id> --collection',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--collection' => 'Delete ALL collection items with the collection ID argument' // @text
    )
);
