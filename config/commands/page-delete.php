<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pgdel',
    'description' => 'Delete one or several pages', // @text
    'usage' => array(
        'gplcart (page-delete | pgdel) -h',
        'gplcart (page-delete | pgdel) --all',
        'gplcart (page-delete | pgdel) --blog',
        'gplcart (page-delete | pgdel) <page id>',
        'gplcart (page-delete | pgdel) <store id> --store',
        'gplcart (page-delete | pgdel) <category id> --category',
        'gplcart (page-delete | pgdel) <user id> --user'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--all' => 'Delete ALL pages if no ID argument specified', // @text
        '--blog' => 'Delete ALL pages which are blog posts', // @text
        '--user' => 'Delete ALL pages with the user ID argument', // @text
        '--store' => 'Delete ALL pages with the store ID argument', // @text
        '--category' => 'Delete ALL pages with the category ID argument' // @text
    )
);
