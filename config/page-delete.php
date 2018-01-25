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
        '--all' => /* @text */'Delete all pages',
        '--blog' => /* @text */'Delete all blog post pages',
        '--user' => /* @text */'Specifies that a user ID used instead of page ID',
        '--store' => /* @text */'Specifies that a store ID used instead of page ID',
        '--category' => /* @text */'Specifies that a category ID used instead of page ID'
    )
);
