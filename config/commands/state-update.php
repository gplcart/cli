<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'csup',
    'description' => 'Update country state', // @text
    'usage' => array(
        'gplcart (state-update | csup) -h',
        'gplcart (state-update | csup) <state id> (--code=<varchar> | --status=<bool>
        | --name=<varchar> | --country=<varchar> | --zone_id=<int>)'
    ),
    'options' => array(
        '--code' => 'Code', // @text
        '--name' => 'Name', // @text
        '--country' => 'Country code', // @text
        '--status' => 'Status', // @text
        '--zone_id' => 'Zone ID', // @text
        '-h' => 'Show command help' // @text
    )
);
