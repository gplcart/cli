<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'readd',
    'description' => 'Add review', // @text
    'usage' => array(
        'gplcart (review-add | readd) -h',
        'gplcart (review-add | readd)',
        'gplcart (review-add | readd) (--user_id=<int> --product_id=<int> --text=<text>) [--status=<bool>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--user_id' => 'User ID', // @text
        '--product_id' => 'Product ID', // @text
        '--text' => 'Text', // @text
        '--status' => 'Status', // @text
    )
);
