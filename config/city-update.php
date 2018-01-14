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
        'gplcart (city-update | ciup) <city id> (--name=<name> | --state_id=<integer> | --country=<code> | --status=<boolean> | --zone_id=<integer>)'
    ),
    'options' => array(
        '--name' => /* @text */'Name',
        '--state_id' => /* @text */'Country state ID',
        '--country' => /* @text */'County code',
        '--status' => /* @text */'Status',
        '--zone_id' => /* @text */'Zone ID',
        '-h' => /* @text */'Show command help'
    )
);
