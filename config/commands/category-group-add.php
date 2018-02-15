<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cgadd',
    'access' => 'category_group_add',
    'description' => 'Add category group', // @text
    'usage' => array(
        'gplcart (category-group-add | cgadd) -h',
        'gplcart (category-group-add | cgadd) [-u=<int>]',
        'gplcart (category-group-add | cgadd) --title=<varchar> [--type=<varchar> --store_id=<int> -u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--title' => 'Name', // @text
        '--type' => 'Type', // @text
        '--store_id' => 'Store ID' // @text
    )
);
