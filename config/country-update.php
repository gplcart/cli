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
        'gplcart (country-update | coup) <country code> (--code=<code> | --status=<bool> | --name=<name> | --native_name=<native name> | --zone_id=<integer> | --weight=<integer> | --format=<json>)'
    ),
    'options' => array(
        '--code' => /* @text */'ISO 3166-2 country code',
        '--name' => /* @text */'International country name',
        '--native_name' => /* @text */'Local country name',
        '--status' => /* @text */'Enable / disable for customers',
        '--zone_id' => /* @text */'Zone ID',
        '--weight' => /* @text */'Position in lists',
        '--format' => /* @text */'JSON string',
        '-h' => /* @text */'Show command help'
    )
);
