<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'redel',
    'access' => 'review_delete',
    'description' => 'Delete one or several reviews', // @text
    'usage' => array(
        'gplcart (review-delete | redel) -h',
        'gplcart (review-delete | redel) --all [-u=<int>]',
        'gplcart (review-delete | redel) <review id> [-u=<int>]',
        'gplcart (review-delete | redel) <user id> --user [-u=<int>]',
        'gplcart (review-delete | redel) <product id> --product [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--all' => 'Delete ALL reviews if no ID argument specified', // @text
        '--user' => 'Delete ALL reviews with the user ID argument', // @text
        '--product' => 'Delete ALL reviews with the product ID argument' // @text
    )
);
