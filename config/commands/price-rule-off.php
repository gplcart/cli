<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'proff',
    'access' => 'price_rule_edit',
    'description' => 'Disable one or several price rules', // @text
    'usage' => array(
        'gplcart (pricerule-off | proff) -h',
        'gplcart (pricerule-off | proff) --all [-u=<int>]',
        'gplcart (pricerule-off | proff) <price rule id> [-u=<int>]',
        'gplcart (pricerule-off | proff) <trigger id> --trigger [-u=<int>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--all' => 'Disable ALL price rules i no ID argument specified', // @text
        '--trigger' => 'Disable ALL price rules with the trigger ID argument' // @text
    )
);
