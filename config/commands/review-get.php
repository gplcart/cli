<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'reget',
    'description' => 'Display one or several reviews', // @text
    'usage' => array(
        'gplcart (review-get | reget) -h',
        'gplcart (review-get | reget) [-f=<format> -l=<offset,limit>]',
        'gplcart (review-get | reget) <review id> [-f=<format>]',
        'gplcart (review-get | reget) <user id> --user [-f=<format> -l=<offset,limit>]',
        'gplcart (review-get | reget) <product id> --product [-f=<format> -l=<offset,limit>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '--user' => 'Display all reviews with the user ID argument', // @text
        '--product' => 'Display all reviews with the product ID argument', // @text
    )
);
