<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cuup',
    'description' => /* @text */'Update currency',
    'usage' => array(
        'gplcart (currency-update | cuup) -h',
        'gplcart (currency-update | cuup) <currency code> (--name=<varchar> | --symbol=<varchar>'
        . ' | --status=<bool> | --default=<bool> | --decimals=<int>'
        . ' | --major_unit=<varchar> | --minor_unit=<varchar> | --numeric_code=<int>'
        . ' | --rounding_step=<decimal> | --conversion_rate=<decimal>'
        . ' | --decimal_separator=<varchar> | --thousands_separator=<varchar> | --template=<varchar>)'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--code' => /* @text */'Code',
        '--name' => /* @text */'Name',
        '--symbol' => /* @text */'Symbol',
        '--major_unit' => /* @text */'Major unit',
        '--minor_unit' => /* @text */'Minor unit',
        '--numeric_code' => /* @text */'Numeric code',
        '--status' => /* @text */'Status',
        '--default' => /* @text */'Default',
        '--decimals' => /* @text */'Decimals',
        '--rounding_step' => /* @text */'Rounding step',
        '--conversion_rate' => /* @text */'Conversion rate',
        '--decimal_separator' => /* @text */'Decimal separator',
        '--thousands_separator' => /* @text */'Thousands separator',
        '--template' => /* @text */'Template'
    )
);
