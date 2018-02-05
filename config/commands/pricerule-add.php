<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pradd',
    'description' => 'Add price rule', // @text
    'usage' => array(
        'gplcart (pricerule-add | pradd) -h',
        'gplcart (pricerule-add | pradd)',
        'gplcart (pricerule-add | pradd) (--name=<varchar> --trigger_id=<int> --value=<int>
         --value_type=<varchar> --currency=<varchar>) [--code=<varchar> --status=<bool> --weight=<int>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--name' => 'Name', // @text
        '--trigger_id' => 'Trigger ID', // @text
        '--value' => 'Value', // @text
        '--value_type' => 'Value type', // @text
        '--currency' => 'Currency', // @text
        '--code' => 'Code', // @text
        '--status' => 'Status', // @text
        '--weight' => 'Weight' // @text
    )
);
