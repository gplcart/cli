<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pgadd',
    'access' => 'page_add',
    'description' => 'Add page', // @text
    'usage' => array(
        'gplcart (page-add | pgadd) -h',
        'gplcart (page-add | pgadd) [-u=<int>]',
        'gplcart (page-add | pgadd) (--title=<varchar> --description=<text> --store_id=<int>) [options]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--title' => 'Title', // @text
        '--description' => 'Description', // @text
        '--store_id' => 'Store ID', // @text
        '--user_id' => 'Author', // @text
        '--category_id' => 'Category', // @text
        '--blog_post' => 'Blog post', // @text
        '--meta_title' => 'Meta title', // @text
        '--meta_description' => 'Meta description', // @text
        '--status' => 'Status' // @text
    )
);
