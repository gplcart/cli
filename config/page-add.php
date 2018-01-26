<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pgadd',
    'description' => /* @text */'Add page',
    'usage' => array(
        'gplcart (page-add | pgadd) -h',
        'gplcart (page-add | pgadd)',
        'gplcart (page-add | pgadd) (--title=<varchar> --description=<text> --store_id=<int>)
        [--user_id=<int> --category_id=<int> --blog_post=<bool>
         --meta_title=<varchar> --meta_description=<varchar> --status=<bool>]',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--title' => /* @text */'Title',
        '--description' => /* @text */'Description',
        '--store_id' => /* @text */'Store ID',
        '--user_id' => /* @text */'Author' . ' [default: 0]',
        '--category_id' => /* @text */'Category' . ' [default: 0]',
        '--blog_post' => /* @text */'Blog post' . ' [default: 0]',
        '--meta_title' => /* @text */'Meta title' . ' [default: ]',
        '--meta_description' => /* @text */'Meta description' . ' [default: ]',
        '--status' => /* @text */'Status' . ' [default: 0]'
    )
);
