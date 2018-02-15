<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cgdel',
    'access' => 'category_group_delete',
    'description' => 'Delete one or several category groups', // @text
    'usage' => array(
        'gplcart (category-group-delete | cgdel) -h',
        'gplcart (category-group-delete | cgdel) --all [-u=<int>]',
        'gplcart (category-group-delete | cgdel) <category group id> [-u=<int>]',
        'gplcart (category-group-delete | cgdel) <store id> --store [-u=<int>]',
        'gplcart (category-group-delete | cgdel) <type> --type [-u=<int>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--all' => 'Delete ALL category groups if no ID argument specified', // @text
        '--type' => 'Delete ALL category groups with the type argument', // @text
        '--store' => 'Delete ALL category groups with the store ID argument' // @text
    )
);
