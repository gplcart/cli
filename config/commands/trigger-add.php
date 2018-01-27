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
        'gplcart (trigger-add | tradd) (--name=<varchar> --conditions=<varchar> --store_id=<int>) [options]',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--name' => /* @text */'Name',
        '--store_id' => /* @text */'Store ID',
        '--status' => /* @text */'Status' . ' [default: 0]',
        '--weight' => /* @text */'Weight' . ' [default: 0]',
        '--conditions' => /* @text */'One or several conditions separated by pipe. Condition format: [condition ID][space][operator][space][parameter(s)]'
    )
);
