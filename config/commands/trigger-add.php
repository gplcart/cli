<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'tradd',
    'access' => 'trigger_add',
    'description' => 'Add trigger', // @text
    'usage' => array(
        'gplcart (trigger-add | tradd) -h',
        'gplcart (trigger-add | tradd) [-u=<int>]',
        'gplcart (trigger-add | tradd) (--name=<varchar> --conditions=<varchar> --store_id=<int>) [options]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--name' => 'Name', // @text
        '--store_id' => 'Store ID', // @text
        '--status' => 'Status', // @text
        '--weight' => 'Weight', // @text
        '--conditions' => 'One or several conditions separated by pipe. Condition format: [condition ID][space][operator][space][parameter(s)]' // @text
    )
);
