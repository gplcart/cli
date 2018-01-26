<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pradd',
    'description' => /* @text */'Add price rule',
    'usage' => array(
        'gplcart (pricerule-add | pradd) -h',
        'gplcart (pricerule-add | pradd)',
        'gplcart (pricerule-add | pradd) (--name=<varchar> --trigger_id=<int> --value=<int>
         --value_type=<varchar> --currency=<varchar>) [--code=<varchar> --status=<bool> --weight=<int>]',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--name' => /* @text */'Name',
        '--trigger_id' => /* @text */'Trigger ID',
        '--value' => /* @text */'Value',
        '--value_type' => /* @text */'Value type',
        '--currency' => /* @text */'Currency',
        '--code' => /* @text */'Code',
        '--status' => /* @text */'Status' . ' [default: 0]',
        '--weight' => /* @text */'Weight' . ' [default: 0]'
    )
);
