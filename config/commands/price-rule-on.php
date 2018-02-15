<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pron',
    'access' => 'price_rule_edit',
    'description' => 'Enable one or several price rules', // @text
    'usage' => array(
        'gplcart (pricerule-on | pron) -h',
        'gplcart (pricerule-on | pron) --all [-u=<int>]',
        'gplcart (pricerule-on | pron) <price rule id> [-u=<int>]',
        'gplcart (pricerule-on | pron) <trigger id> --trigger [-u=<int>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--all' => 'Enable ALL price rules i no ID argument specified', // @text
        '--trigger' => 'Enable ALL price rules with the trigger ID argument' // @text
    )
);
