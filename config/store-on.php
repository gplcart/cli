<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'son',
    'description' => /* @text */'Enable one or several stores',
    'usage' => array(
        'gplcart (store-on | son) -h',
        'gplcart (store-on | son) --all',
        'gplcart (store-on | son) <store id>'
    ),
    'options' => array(
        '--all' => /* @text */'Enable all stores if no store ID specified',
        '-h' => /* @text */'Show command help'
    )
);
