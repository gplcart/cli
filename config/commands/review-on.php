<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'reon',
    'description' => /* @text */'Enable one or several reviews',
    'usage' => array(
        'gplcart (review-on | reon) -h',
        'gplcart (review-on | reon) --all',
        'gplcart (review-on | reon) <review id>',
        'gplcart (review-on | reon) <user id> --user',
        'gplcart (review-on | reon) <product id> --product'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--all' => /* @text */'Enable ALL reviews if no ID argument specified',
        '--user' => /* @text */'Enable ALL reviews with the user ID argument',
        '--product' => /* @text */'Enable ALL reviews with the product ID argument'
    )
);
