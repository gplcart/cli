<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'ctadd',
    'description' => /* @text */'Add category',
    'usage' => array(
        'gplcart (category-add | ctadd) -h',
        'gplcart (category-add | ctadd)',
        'gplcart (category-add | ctadd) (--title=<varchar> --category_group_id=<int>) [--parent_id=<int>
         --description_1=<text> --description_2=<text> --meta_title=<varchar> --meta_description=<text> --status=<int>
         --weight=<int>]',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--title' => /* @text */'Title',
        '--category_group_id' => /* @text */'Category group',
        '--parent_id' => /* @text */'Parent category ID' . ' [default: 0]',
        '--description_1' => /* @text */'First description' . ' [default: ]',
        '--description_2' => /* @text */'Second description' . ' [default: ]',
        '--meta_title' => /* @text */'Meta title' . ' [default: ]',
        '--meta_description' => /* @text */'Meta description' . ' [default: ]',
        '--status' => /* @text */'Status' . ' [default: 0]',
        '--weight' => /* @text */'Weight' . ' [default: 0]'
    )
);
