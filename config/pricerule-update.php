<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'prup',
    'description' => /* @text */'Update price rule',
    'usage' => array(
        'gplcart (pricerule-update | prup) -h',
        'gplcart (pricerule-update | prup) <price rule id> (--name=<varchar> | --trigger_id=<int> | --value=<int>
        | --value_type=<varchar> | --currency=<varchar> | --code=<varchar> | --status=<bool> | --weight=<int>)',
    ),
    'options' => array(
        '--name' => /* @text */'Name',
        '--trigger_id' => /* @text */'Trigger ID',
        '--value' => /* @text */'Value',
        '--value_type' => /* @text */'Value type',
        '--currency' => /* @text */'Currency',
        '--code' => /* @text */'Code',
        '--status' => /* @text */'Status',
        '--weight' => /* @text */'Weight',
        '-h' => /* @text */'Show command help'
    )
);
