<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cladd',
    'description' => 'Add collection', // @text
    'usage' => array(
        'gplcart (collection-add | cladd) -h',
        'gplcart (collection-add | cladd)',
        'gplcart (collection-add | cladd) (--title=<varchar> --type=<varchar> --description=<varchar> --store_id=<int>) [--status=<bool>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--store_id' => 'Store ID', // @text
        '--type' => 'Type', // @text
        '--title' => 'Title', // @text
        '--status' => 'Status', // @text
        '--description' => 'Description' // @text
    )
);
