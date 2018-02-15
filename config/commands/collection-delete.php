<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cldel',
    'access' => 'collection_delete',
    'description' => 'Delete one or several collections', // @text
    'usage' => array(
        'gplcart (collection-delete | cldel) -h',
        'gplcart (collection-delete | cldel) --all [-u=<int>]',
        'gplcart (collection-delete | cldel) <collection id> [-u=<int>]',
        'gplcart (collection-delete | cldel) <collection type> --type [-u=<int>]',
        'gplcart (collection-delete | cldel) <collection store id> --store [-u=<int>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--all' => 'Delete ALL collections if no ID specified', // @text
        '--type' => 'Delete ALL collections with the type argument', // @text
        '--store' => 'Delete ALL collections with the store ID argument', // @text
    )
);
