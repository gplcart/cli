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
        'gplcart (state-add | csadd) (--code=<varchar> --name=<varchar> --country=<varchar>) [options]',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--code' => /* @text */'Code',
        '--name' => /* @text */'Name',
        '--country' => /* @text */'Code',
        '--status' => /* @text */'Status' . ' [default: 0]',
        '--zone_id' => /* @text */'Zone ID' . ' [default: 0]'
    )
);
