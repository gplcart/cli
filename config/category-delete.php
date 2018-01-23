<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'ctdel',
    'description' => /* @text */'Delete one or several categories',
    'usage' => array(
        'gplcart (category-delete | ctdel) -h',
        'gplcart (category-delete | ctdel) --all',
        'gplcart (category-delete | ctdel) <category id>',
        'gplcart (category-delete | ctdel) <store id> --store',
        'gplcart (category-delete | ctdel) <category group id> --group'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--all' => /* @text */'Delete all categories if no ID argument specified',
        '--group' => /* @text */'Specifies that a category group ID used instead of category ID',
        '--store' => /* @text */'Specifies that a store ID used instead of category ID',
    )
);
