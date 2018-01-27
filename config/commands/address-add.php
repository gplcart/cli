<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'aadd',
    'description' => /* @text */'Add address',
    'usage' => array(
        'gplcart (address-add | aadd) -h',
        'gplcart (address-add | aadd)',
        'gplcart (address-add | aadd) (--user_id=<varchar> --state_id=<int> --country=<varchar>
         --city_id=<varchar> --address_1=<varchar> --address_2=<varchar> --phone=<varchar> --fax=<varchar>
         --type=<varchar> --first_name=<varchar> --middle_name=<varchar> --last_name=<varchar>
         --postcode=<varchar> --company=<varchar>) [--data=<varchar>]',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--user_id' => /* @text */'User ID',
        '--state_id' => /* @text */'Country state ID',
        '--country' => /* @text */'County code',
        '--city_id' => /* @text */'City ID',
        '--address_1' => /* @text */'Address',
        '--address_2' => /* @text */'Additional address',
        '--phone' => /* @text */'Phone',
        '--type' => /* @text */'Address type' . ' [default: shipping]',
        '--first_name' => /* @text */'First name',
        '--middle_name' => /* @text */'Middle name',
        '--last_name' => /* @text */'Last name',
        '--postcode' => /* @text */'Phone',
        '--company' => /* @text */'Company',
        '--data' => /* @text */'JSON or base64 encoded JSON string'
    )
);
