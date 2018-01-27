<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'reoff',
    'description' => /* @text */'Disable one or several reviews',
    'usage' => array(
        'gplcart (review-off | reoff) -h',
        'gplcart (review-off | reoff) --all',
        'gplcart (review-off | reoff) <review id>',
        'gplcart (review-off | reoff) <user id> --user',
        'gplcart (review-off | reoff) <product id> --product'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--all' => /* @text */'Disable ALL reviews if no ID argument specified',
        '--user' => /* @text */'Disable ALL reviews with the user ID argument',
        '--product' => /* @text */'Disable ALL reviews with the product ID argument'
    )
);
