<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'coup',
    'description' => /* @text */'Update country',
    'usage' => array(
        'gplcart (country-update | coup) -h',
        'gplcart (country-update | coup) <country code> (--code=<varchar> | --status=<bool> | --name=<varchar>
        | --native_name=<varchar> | --zone_id=<int> | --weight=<int> | --format=<json>)'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--code' => /* @text */'Code',
        '--name' => /* @text */'Name',
        '--native_name' => /* @text */'Native name',
        '--status' => /* @text */'Status',
        '--zone_id' => /* @text */'Zone ID',
        '--weight' => /* @text */'Weight',
        '--format' => /* @text */'JSON string'
    )
);
