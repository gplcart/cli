<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'readd',
    'description' => /* @text */'Add review',
    'usage' => array(
        'gplcart (review-add | readd) -h',
        'gplcart (review-add | readd)',
        'gplcart (review-add | readd) (--user_id=<int> --product_id=<int> --text=<text>) [--status=<bool>]',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--user_id' => /* @text */'User ID',
        '--product_id' => /* @text */'Product ID',
        '--text' => /* @text */'Text',
        '--status' => /* @text */'Status' . ' [default: 0]',
    )
);
