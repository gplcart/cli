<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'ctdel',
    'access' => 'category_delete',
    'description' => 'Delete one or several categories', // @text
    'usage' => array(
        'gplcart (category-delete | ctdel) -h',
        'gplcart (category-delete | ctdel) --all [-u=<integer>]',
        'gplcart (category-delete | ctdel) <category id> [-u=<integer>]',
        'gplcart (category-delete | ctdel) <store id> --store [-u=<integer>]',
        'gplcart (category-delete | ctdel) <category group id> --group [-u=<integer>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--all' => 'Delete ALL categories if no ID argument specified', // @text
        '--group' => 'Delete ALL categories with the category group ID argument', // @text
        '--store' => 'Delete ALL categories with the store ID argument', // @text
    )
);
