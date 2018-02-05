<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'proff',
    'description' => 'Disable one or several price rules', // @text
    'usage' => array(
        'gplcart (pricerule-off | proff) -h',
        'gplcart (pricerule-off | proff) --all',
        'gplcart (pricerule-off | proff) <price rule id>',
        'gplcart (pricerule-off | proff) <trigger id> --trigger',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--all' => 'Disable ALL price rules i no ID argument specified', // @text
        '--trigger' => 'Disable ALL price rules with the trigger ID argument' // @text
    )
);
