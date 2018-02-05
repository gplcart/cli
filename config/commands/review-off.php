<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'reoff',
    'description' => 'Disable one or several reviews', // @text
    'usage' => array(
        'gplcart (review-off | reoff) -h',
        'gplcart (review-off | reoff) --all',
        'gplcart (review-off | reoff) <review id>',
        'gplcart (review-off | reoff) <user id> --user',
        'gplcart (review-off | reoff) <product id> --product'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--all' => 'Disable ALL reviews if no ID argument specified', // @text
        '--user' => 'Disable ALL reviews with the user ID argument', // @text
        '--product' => 'Disable ALL reviews with the product ID argument' // @text
    )
);
