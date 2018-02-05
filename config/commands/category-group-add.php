<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cgadd',
    'description' => 'Add category group', // @text
    'usage' => array(
        'gplcart (category-group-add | cgadd) -h',
        'gplcart (category-group-add | cgadd)',
        'gplcart (category-group-add | cgadd) --title=<varchar> [--type=<varchar> --store_id=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--title' => 'Name', // @text
        '--type' => 'Type', // @text
        '--store_id' => 'Store ID' // @text
    )
);
