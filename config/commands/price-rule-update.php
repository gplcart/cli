<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'prup',
    'access' => 'price_rule_edit',
    'description' => 'Update price rule', // @text
    'usage' => array(
        'gplcart (pricerule-update | prup) -h',
        'gplcart (pricerule-update | prup) <price rule id> (--name=<varchar> | --trigger_id=<int> | --value=<int>
        | --value_type=<varchar> | --currency=<varchar> | --code=<varchar> | --status=<bool> | --weight=<int>) [-u=<int>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--name' => 'Name', // @text
        '--trigger_id' => 'Trigger ID', // @text
        '--value' => 'Value', // @text
        '--value_type' => 'Value type', // @text
        '--currency' => 'Currency', // @text
        '--code' => 'Code', // @text
        '--status' => 'Status', // @text
        '--weight' => 'Weight', // @text
    )
);
