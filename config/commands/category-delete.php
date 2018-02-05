<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'ctdel',
    'description' => 'Delete one or several categories', // @text
    'usage' => array(
        'gplcart (category-delete | ctdel) -h',
        'gplcart (category-delete | ctdel) --all',
        'gplcart (category-delete | ctdel) <category id>',
        'gplcart (category-delete | ctdel) <store id> --store',
        'gplcart (category-delete | ctdel) <category group id> --group'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--all' => 'Delete ALL categories if no ID argument specified', // @text
        '--group' => 'Delete ALL categories with the category group ID argument', // @text
        '--store' => 'Delete ALL categories with the store ID argument', // @text
    )
);
