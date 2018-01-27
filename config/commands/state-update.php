<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'csup',
    'description' => /* @text */'Update country state',
    'usage' => array(
        'gplcart (state-update | csup) -h',
        'gplcart (state-update | csup) <state id> (--code=<varchar> | --status=<bool>
        | --name=<varchar> | --country=<varchar> | --zone_id=<int>)'
    ),
    'options' => array(
        '--code' => /* @text */'Code',
        '--name' => /* @text */'Name',
        '--country' => /* @text */'Country code',
        '--status' => /* @text */'Status',
        '--zone_id' => /* @text */'Zone ID',
        '-h' => /* @text */'Show command help'
    )
);
