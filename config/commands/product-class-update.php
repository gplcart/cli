<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pcup',
    'description' => 'Update product class', // @text
    'usage' => array(
        'gplcart (product-class-update | pcup) -h',
        'gplcart (product-class-update | pcup)',
        'gplcart (product-class-update | pcup) <product class id> (--title=<varchar> | --status=<bool>)',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--title' => 'Title', // @text
        '--status' => 'Status' // @text
    )
);
