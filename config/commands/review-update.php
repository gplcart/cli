<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'reup',
    'access' => 'review_edit',
    'description' => 'Update review', // @text
    'usage' => array(
        'gplcart (review-update | reup) -h',
        'gplcart (review-update | reup) <review id> (--user_id=<int>
        | --product_id=<int> | --text=<text> | --status=<bool>) [-u=<int>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--user_id' => 'User ID', // @text
        '--product_id' => 'Product ID', // @text
        '--text' => 'Text', // @text
        '--status' => 'Status', // @text
    )
);
