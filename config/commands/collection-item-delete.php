<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'clidel',
    'description' => /* @text */'Delete one or several collection items',
    'usage' => array(
        'gplcart (collection-item-delete | clidel) -h',
        'gplcart (collection-item-delete | clidel) <collection item id>',
        'gplcart (collection-item-delete | clidel) <collection id> --collection',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--collection' => /* @text */'Delete ALL collection items for the collection ID argument'
    )
);
