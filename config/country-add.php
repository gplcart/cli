<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'coadd',
    'description' => /* @text */'Add country',
    'usage' => array(
        'gplcart (country-add | coadd) -h',
        'gplcart (country-add | coadd)',
        'gplcart (country-add | coadd) (--code=<code> --name=<name> --native_name=<native name>) [options]',
    ),
    'options' => array(
        '--code' => /* @text */'ISO 3166-2 country code',
        '--name' => /* @text */'International country name',
        '--native_name' => /* @text */'Local country name',
        '--status' => /* @text */'Enable / disable for customers [default: 0]',
        '--zone_id' => /* @text */'Zone ID [default: 0]',
        '--weight' => /* @text */'Position in lists [default: 0]',
        '--format' => /* @text */'JSON string',
        '-h' => /* @text */'Show command help'
    )
);
