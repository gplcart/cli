<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cuadd',
    'access' => 'currency_add',
    'description' => 'Add currency', // @text
    'usage' => array(
        'gplcart (currency-add | cuadd) -h',
        'gplcart (currency-add | cuadd) [-u=<int>]',
        'gplcart (currency-add | cuadd)
        (--code=<code> --name=<varchar> --symbol=<varchar> --major_unit=<varchar> --minor_unit=<varchar>
        --numeric_code=<int>) [options]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--code' => 'Code', // @text
        '--name' => 'Name', // @text
        '--symbol' => 'Symbol', // @text
        '--major_unit' => 'Major unit', // @text
        '--minor_unit' => 'Minor unit', // @text
        '--numeric_code' => 'Numeric code', // @text
        '--status' => 'Status', // @text
        '--default' => 'Default', // @text
        '--decimals' => 'Decimals', // @text
        '--rounding_step' => 'Rounding step', // @text
        '--conversion_rate' => 'Conversion rate', // @text
        '--decimal_separator' => 'Decimal separator', // @text
        '--thousands_separator' => 'Thousands separator', // @text
        '--template' => 'Template' // @text
    )
);
