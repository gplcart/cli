<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'redel',
    'description' => /* @text */'Delete one or several reviews',
    'usage' => array(
        'gplcart (review-delete | redel) -h',
        'gplcart (review-delete | redel) --all',
        'gplcart (review-delete | redel) <review id>',
        'gplcart (review-delete | redel) <user id> --user',
        'gplcart (review-delete | redel) <product id> --product'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--all' => /* @text */'Delete ALL reviews if no ID argument specified',
        '--user' => /* @text */'Delete ALL reviews with the user ID argument',
        '--product' => /* @text */'Delete ALL reviews with the product ID argument'
    )
);
