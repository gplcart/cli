<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cgdel',
    'description' => /* @text */'Delete one or several category groups',
    'usage' => array(
        'gplcart (category-group-delete | cgdel) -h',
        'gplcart (category-group-delete | cgdel) --all',
        'gplcart (category-group-delete | cgdel) <category group id>',
        'gplcart (category-group-delete | cgdel) <store id> --store',
        'gplcart (category-group-delete | cgdel) <type> --type',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--all' => /* @text */'Delete ALL category groups if no ID argument specified',
        '--type' => /* @text */'Delete ALL category groups for the type argument',
        '--store' => /* @text */'Delete ALL category groups for the store ID argument'
    )
);