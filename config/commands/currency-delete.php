<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cudel',
    'description' => 'Delete one or all currencies', // @text
    'usage' => array(
        'gplcart (currency-delete | cudel) -h',
        'gplcart (currency-delete | cudel) --all',
        'gplcart (currency-delete | cudel) <currency code>'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--all' => 'Delete ALL currencies if no currency code argument specified', // @text
    )
);
