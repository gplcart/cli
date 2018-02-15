<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pgdel',
    'access' => 'page_delete',
    'description' => 'Delete one or several pages', // @text
    'usage' => array(
        'gplcart (page-delete | pgdel) -h',
        'gplcart (page-delete | pgdel) --all [-u=<int>]',
        'gplcart (page-delete | pgdel) --blog [-u=<int>]',
        'gplcart (page-delete | pgdel) <page id> [-u=<int>]',
        'gplcart (page-delete | pgdel) <store id> --store [-u=<int>]',
        'gplcart (page-delete | pgdel) <category id> --category [-u=<int>]',
        'gplcart (page-delete | pgdel) <user id> --user [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--all' => 'Delete ALL pages if no ID argument specified', // @text
        '--blog' => 'Delete ALL pages which are blog posts', // @text
        '--user' => 'Delete ALL pages with the user ID argument', // @text
        '--store' => 'Delete ALL pages with the store ID argument', // @text
        '--category' => 'Delete ALL pages with the category ID argument' // @text
    )
);
