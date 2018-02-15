<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'trup',
    'access' => 'trigger_edit',
    'description' => 'Update trigger', // @text
    'usage' => array(
        'gplcart (trigger-update | trup) -h',
        'gplcart (trigger-update | trup) <trigger id> (--name=<varchar> | --conditions=<varchar> | --store_id=<int>
        | --status=<bool> | --weight=<int>) [-u=<int>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--name' => 'Name', // @text
        '--status' => 'Status', // @text
        '--weight' => 'Weight', // @text
        '--store_id' => 'Store ID', // @text
        '--conditions' => 'One or several conditions separated by pipe. Condition format: [condition ID][space][operator][space][parameter(s)]' // @text
    )
);
