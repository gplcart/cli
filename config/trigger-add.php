<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'tradd',
    'description' => /* @text */'Add trigger',
    'usage' => array(
        'gplcart (trigger-add | tradd) -h',
        'gplcart (trigger-add | tradd)',
        'gplcart (trigger-add | tradd) (--name=<name> --conditions=<condition1|condition2> --store_id=<integer>) [options]',
    ),
    'options' => array(
        '--name' => /* @text */'Trigger name',
        '--store_id' => /* @text */'Store ID',
        '--conditions' => /* @text */'One or several conditions separated by delimiter. Condition format: [condition ID][space][operator][space][parameter(s)]',
        '--status' => /* @text */'Enable / disable [default: 0]',
        '--weight' => /* @text */'Position in lists [default: 0]',
        '-h' => /* @text */'Show command help'
    )
);
