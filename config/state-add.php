<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'csadd',
    'description' => /* @text */'Add country state',
    'usage' => array(
        'gplcart (state-add | csadd) -h',
        'gplcart (state-add | csadd)',
        'gplcart (state-add | csadd) (--code=<code> --name=<name> --country=<code>) [options]',
    ),
    'options' => array(
        '--code' => /* @text */'Code',
        '--name' => /* @text */'Name',
        '--country' => /* @text */'County code',
        '--status' => /* @text */'Status [default: 0]',
        '--zone_id' => /* @text */'Zone ID [default: 0]',
        '-h' => /* @text */'Show command help'
    )
);
