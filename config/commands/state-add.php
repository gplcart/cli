<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'csadd',
    'description' => 'Add country state', // @text
    'usage' => array(
        'gplcart (state-add | csadd) -h',
        'gplcart (state-add | csadd)',
        'gplcart (state-add | csadd) (--code=<varchar> --name=<varchar> --country=<varchar>) [options]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--code' => 'Code', // @text
        '--name' => 'Name', // @text
        '--country' => 'Code', // @text
        '--status' => 'Status', // @text
        '--zone_id' => 'Zone ID' // @text
    )
);
