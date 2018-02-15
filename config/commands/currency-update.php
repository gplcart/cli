<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cuup',
    'access' => 'currency_edit',
    'description' => 'Update currency', // @text
    'usage' => array(
        'gplcart (currency-update | cuup) -h',
        'gplcart (currency-update | cuup) <currency code> (--name=<varchar> | --symbol=<varchar>'
        . ' | --status=<bool> | --default=<bool> | --decimals=<int>'
        . ' | --major_unit=<varchar> | --minor_unit=<varchar> | --numeric_code=<int>'
        . ' | --rounding_step=<decimal> | --conversion_rate=<decimal>'
        . ' | --decimal_separator=<varchar> | --thousands_separator=<varchar> | --template=<varchar>) [-u=<int>]'
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
