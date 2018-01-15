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
        'gplcart (currency-update | cuup) <currency code> (--name=<name> | --symbol=<symbol>'
        . ' | --status=<boolean> | --default=<boolean> | --decimals=<integer>'
        . ' | --major_unit=<name> | --minor_unit=<name> | --numeric_code=<integer>'
        . ' | --rounding_step=<numeric> | --conversion_rate=<numeric>'
        . ' | --decimal_separator=<string> | --thousands_separator=<string> | --template=<string>)'
    ),
    'options' => array(
        '--name' => /* @text */'Currency name',
        '--symbol' => /* @text */'Currency sign',
        '--status' => /* @text */'Enable / disable for customers',
        '--default' => /* @text */'Set default',
        '--decimals' => /* @text */'Number of decimal points',
        '--major_unit' => /* @text */'Name of the highest valued currency unit',
        '--minor_unit' => /* @text */'Name of the lowest valued currency unit',
        '--numeric_code' => /* @text */'ISO 4217 currency numeric code',
        '--rounding_step' => /* @text */'Rounding step',
        '--conversion_rate' => /* @text */'Exchange rate against base currency',
        '--decimal_separator' => /* @text */'Character to separate decimals',
        '--thousands_separator' => /* @text */'Character to separate thousands',
        '--template' => /* @text */'Template to format prices',
        '-h' => /* @text */'Show command help'
    )
);
