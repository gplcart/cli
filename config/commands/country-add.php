<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'coadd',
    'description' => 'Add country', // @text
    'usage' => array(
        'gplcart (country-add | coadd) -h',
        'gplcart (country-add | coadd)',
        'gplcart (country-add | coadd) (--code=<varchar> --name=<varchar> --native_name=<varchar>) [options]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--code' => 'Code', // @text
        '--name' => 'Name', // @text
        '--native_name' => 'Native name', // @text
        '--status' => 'Status', // @text
        '--zone_id' => 'Zone ID', // @text
        '--weight' => 'Weight', // @text
        '--format' => 'JSON or base64 encoded JSON string' // @text
    )
);
