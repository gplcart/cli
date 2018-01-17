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
        'gplcart (trigger-update | trup) <trigger id> (--name=<name> | --conditions=<condition1|condition2> | --store_id=<integer> | --status=<boolean> | --weight=<integer>)',
    ),
    'options' => array(
        '--name' => /* @text */'Trigger name',
        '--store_id' => /* @text */'Store ID',
        '--conditions' => /* @text */'One or several conditions separated by comma. Condition format: [condition ID][space][operator][space][parameter(s)]',
        '--status' => /* @text */'Enable / disable',
        '--weight' => /* @text */'Position in lists',
        '-h' => /* @text */'Show command help'
    )
);
