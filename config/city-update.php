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
        'gplcart (city-update | ciup) <city id> (--name=<name> | --state_id=<integer> | --country=<code>
        | --status=<boolean> | --zone_id=<integer>)'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--name' => /* @text */'Name',
        '--zone_id' => /* @text */'Zone ID',
        '--country' => /* @text */'County code',
        '--state_id' => /* @text */'Country state ID',
        '--status' => /* @text */'Status' . ' [default: 0]'
    )
);
