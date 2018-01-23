<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cgup',
    'description' => /* @text */'Update category group',
    'usage' => array(
        'gplcart (category-group-update | cgup) -h',
        'gplcart (category-group-update | cgup) <category group id> (--title=<varchar> | --type=<varchar> | --store_id=<int>)'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--title' => /* @text */'Category group name',
        '--type' => /* @text */'Category group type',
        '--store_id' => /* @text */'Store ID'
    )
);
