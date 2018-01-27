<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'ctup',
    'description' => /* @text */'Update category',
    'usage' => array(
        'gplcart (category-update | ctup) -h',
        'gplcart (category-update | ctup) <category id> (--title=<varchar> | --category_group_id=<int>
         | --parent_id=<int> | --description_1=<text> | --description_2=<text> | --meta_title=<varchar>
         | --meta_description=<text> | --status=<int> | --weight=<int>)',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--title' => /* @text */'Category title',
        '--category_group_id' => /* @text */'Category group ID',
        '--parent_id' => /* @text */'Parent category',
        '--description_1' => /* @text */'First description',
        '--description_2' => /* @text */'Second description',
        '--meta_title' => /* @text */'Meta title',
        '--meta_description' => /* @text */'Meta description',
        '--status' => /* @text */'Status' . ' [default: 0]',
        '--weight' => /* @text */'Weight' . ' [default: 0]'
    )
);
