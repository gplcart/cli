<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pgup',
    'description' => 'Update page', // @text
    'usage' => array(
        'gplcart (page-update | pgup) -h',
        'gplcart (page-update | pgup) <page id> (--title=<varchar> | --description=<text> | --user_id=<int>
        | --category_id=<int> | --store_id=<int> | --blog_post=<bool>
        | --meta_title=<varchar> | --meta_description=<varchar> | --status=<bool>)',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--title' => 'Title', // @text
        '--description' => 'Description', // @text
        '--store_id' => 'Store ID', // @text
        '--user_id' => 'User ID', // @text
        '--category_id' => 'Category ID', // @text
        '--blog_post' => 'Blog post', // @text
        '--meta_title' => 'Meta title', // @text
        '--meta_description' => 'Meta description', // @text
        '--status' => 'Status' // @text
    )
);
