<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'reon',
    'access' => 'review_edit',
    'description' => 'Enable one or several reviews', // @text
    'usage' => array(
        'gplcart (review-on | reon) -h',
        'gplcart (review-on | reon) --all [-u=<int>]',
        'gplcart (review-on | reon) <review id> [-u=<int>]',
        'gplcart (review-on | reon) <user id> --user [-u=<int>]',
        'gplcart (review-on | reon) <product id> --product [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--all' => 'Enable ALL reviews if no ID argument specified', // @text
        '--user' => 'Enable ALL reviews with the user ID argument', // @text
        '--product' => 'Enable ALL reviews with the product ID argument' // @text
    )
);
