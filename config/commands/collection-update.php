<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'clup',
    'access' => 'collection_edit',
    'description' => 'Update collection', // @text
    'usage' => array(
        'gplcart (collection-update | clup) -h',
        'gplcart (collection-update | clup) <collection id> (--title=<varchar> | --type=<varchar>
         | --description=<text> | --store_id=<int> | --status=<boolean>) [-u=<int>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--title' => 'Title', // @text
        '--type' => 'Type', // @text
        '--store_id' => 'Store ID', // @text
        '--description' => 'Description', // @text
        '--status' => 'Status' // @text
    )
);
