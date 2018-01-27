<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'ciup',
    'description' => /* @text */'Update city',
    'usage' => array(
        'gplcart (city-update | ciup) -h',
        'gplcart (city-update | ciup) <city id> (--name=<varchar> | --state_id=<int> | --country=<varchar>
        | --status=<bool> | --zone_id=<int>)'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--name' => /* @text */'Name',
        '--zone_id' => /* @text */'Zone ID',
        '--country' => /* @text */'County code',
        '--state_id' => /* @text */'State ID',
        '--status' => /* @text */'Status' . ' [default: 0]'
    )
);
