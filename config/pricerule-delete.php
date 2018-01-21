<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'prdel',
    'description' => /* @text */'Delete one or several price rules',
    'usage' => array(
        'gplcart (pricerule-delete | prdel) -h',
        'gplcart (pricerule-delete | prdel) --all',
        'gplcart (pricerule-delete | prdel) <price rule id>',
        'gplcart (pricerule-delete | prdel) <trigger id> --trigger'

    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--all' => /* @text */'Delete all price rules',
        '--trigger' => /* @text */'Specifies that a trigger ID used instead of price rule ID'
    )
);
