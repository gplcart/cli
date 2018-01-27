<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cudel',
    'description' => /* @text */'Delete one or all currencies',
    'usage' => array(
        'gplcart (currency-delete | cudel) -h',
        'gplcart (currency-delete | cudel) --all',
        'gplcart (currency-delete | cudel) <currency code>'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--all' => /* @text */'Delete ALL currencies if no currency code argument specified',
    )
);
