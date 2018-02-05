<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cgdel',
    'description' => 'Delete one or several category groups', // @text
    'usage' => array(
        'gplcart (category-group-delete | cgdel) -h',
        'gplcart (category-group-delete | cgdel) --all',
        'gplcart (category-group-delete | cgdel) <category group id>',
        'gplcart (category-group-delete | cgdel) <store id> --store',
        'gplcart (category-group-delete | cgdel) <type> --type',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--all' => 'Delete ALL category groups if no ID argument specified', // @text
        '--type' => 'Delete ALL category groups with the type argument', // @text
        '--store' => 'Delete ALL category groups with the store ID argument' // @text
    )
);
