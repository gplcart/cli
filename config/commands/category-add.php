<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'ctadd',
    'access' => 'category_add',
    'description' => 'Add category', // @text
    'usage' => array(
        'gplcart (category-add | ctadd) -h',
        'gplcart (category-add | ctadd) [-u=<integer>]',
        'gplcart (category-add | ctadd) (--title=<varchar> --category_group_id=<int>) [--parent_id=<int>
         --description_1=<text> --description_2=<text> --meta_title=<varchar> --meta_description=<text> --status=<int>
         --weight=<int>] [-u=<integer>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--title' => 'Title', // @text
        '--category_group_id' => 'Category group', // @text
        '--parent_id' => 'Parent category ID', // @text
        '--description_1' => 'First description', // @text
        '--description_2' => 'Second description', // @text
        '--meta_title' => 'Meta title', // @text
        '--meta_description' => 'Meta description', // @text
        '--status' => 'Status', // @text
        '--weight' => 'Weight', // @text
    )
);
