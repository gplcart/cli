<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'trup',
    'description' => /* @text */'Update trigger',
    'usage' => array(
        'gplcart (trigger-update | trup) -h',
        'gplcart (trigger-update | trup) <trigger id> (--name=<varchar> | --conditions=<varchar> | --store_id=<int>
        | --status=<bool> | --weight=<int>)',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--name' => /* @text */'Name',
        '--status' => /* @text */'Status',
        '--weight' => /* @text */'Weight',
        '--store_id' => /* @text */'Store ID',
        '--conditions' => /* @text */'One or several conditions separated by pipe. Condition format: [condition ID][space][operator][space][parameter(s)]'
    )
);
