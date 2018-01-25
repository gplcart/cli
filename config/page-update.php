<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pgup',
    'description' => /* @text */'Update page',
    'usage' => array(
        'gplcart (page-update | pgup) -h',
        'gplcart (page-update | pgup) <page id> (--title=<varchar> | --description=<text> | --user_id=<int>
        | --related_page_id=<int> | --category_id=<int> | --store_id=<int> | --blog_post=<bool>
        | --meta_title=<varchar> | --meta_description=<varchar> | --status=<bool>)',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--title' => /* @text */'Title',
        '--description' => /* @text */'Description',
        '--store_id' => /* @text */'Store ID',
        '--user_id' => /* @text */'User ID',
        '--related_page_id' => /* @text */'Related page ID',
        '--category_id' => /* @text */'Category ID',
        '--blog_post' => /* @text */'Is blog post',
        '--meta_title' => /* @text */'Meta title',
        '--meta_description' => /* @text */'Meta description',
        '--status' => /* @text */'Status'
    )
);
