<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pgdel',
    'description' => /* @text */'Delete one or several pages',
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
        '-h' => /* @text */'Show command help',
        '--all' => /* @text */'Delete ALL pages if no ID argument specified',
        '--blog' => /* @text */'Delete ALL pages which are blog posts',
        '--user' => /* @text */'Delete ALL pages with user ID argument',
        '--store' => /* @text */'Delete ALL pages with store ID argument',
        '--category' => /* @text */'Delete ALL pages with category ID argument'
    )
);
