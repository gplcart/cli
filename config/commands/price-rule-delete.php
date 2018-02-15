<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'prdel',
    'access' => 'price_rule_delete',
    'description' => 'Delete one or several price rules', // @text
    'usage' => array(
        'gplcart (price-rule-delete | prdel) -h',
        'gplcart (price-rule-delete | prdel) --all [-u=<int>]',
        'gplcart (price-rule-delete | prdel) <price rule id> [-u=<int>]',
        'gplcart (price-rule-delete | prdel) <trigger id> --trigger [-u=<int>]'

    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--all' => 'Delete ALL price rules if no ID argument specified', // @text
        '--trigger' => 'Delete ALL price rules with the trigger ID argument' // @text
    )
);
