<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cladd',
    'access' => 'collection_add',
    'description' => 'Add collection', // @text
    'usage' => array(
        'gplcart (collection-add | cladd) -h',
        'gplcart (collection-add | cladd) [-u=<int>]',
        'gplcart (collection-add | cladd)
        (--title=<varchar> --type=<varchar> --description=<varchar> --store_id=<int>) [--status=<bool> -u=<int>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--store_id' => 'Store ID', // @text
        '--type' => 'Type', // @text
        '--title' => 'Title', // @text
        '--status' => 'Status', // @text
        '--description' => 'Description' // @text
    )
);
