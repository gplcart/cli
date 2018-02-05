<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pgadd',
    'description' => 'Add page', // @text
    'usage' => array(
        'gplcart (page-add | pgadd) -h',
        'gplcart (page-add | pgadd)',
        'gplcart (page-add | pgadd) (--title=<varchar> --description=<text> --store_id=<int>)
        [--user_id=<int> --category_id=<int> --blog_post=<bool>
         --meta_title=<varchar> --meta_description=<varchar> --status=<bool>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
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
