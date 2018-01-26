<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'proff',
    'description' => /* @text */'Disable one or several price rules',
    'usage' => array(
        'gplcart (pricerule-off | proff) -h',
        'gplcart (pricerule-off | proff) --all',
        'gplcart (pricerule-off | proff) <price rule id>',
        'gplcart (pricerule-off | proff) <trigger id> --trigger',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--all' => /* @text */'Disable ALL price rules i no ID argument specified',
        '--trigger' => /* @text */'Disable ALL price rules with the trigger ID argument'
    )
);
