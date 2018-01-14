<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cuadd',
    'description' => /* @text */'Add currency',
    'usage' => array(
        'gplcart (currency-add | cuadd) -h',
        'gplcart (currency-add | cuadd)',
        'gplcart (currency-add | cuadd) (--code=<code> --name=<name> --symbol=<symbol> --major_unit=<name> --minor_unit=<name> --numeric_code=<integer>) [options]'
    ),
    'options' => array(
        // Required
        'code' => /* @text */'ISO 4217 currency code',
        'name' => /* @text */'Currency name',
        'symbol' => /* @text */'Currency sign',
        'major_unit' => /* @text */'Name of the highest valued currency unit',
        'minor_unit' => /* @text */'Name of the lowest valued currency unit',
        'numeric_code' => /* @text */'ISO 4217 currency numeric code',
        // Optional
        'status' => /* @text */'Enable / disable for customers [default: 0]',
        'default' => /* @text */'Set default [default: 0]',
        'decimals' => /* @text */'Number of decimal points [default: 2]',
        'rounding_step' => /* @text */'Rounding step [default: 0]',
        'conversion_rate' => /* @text */'Exchange rate against base currency [default: 1]',
        'decimal_separator' => /* @text */'Character to separate decimals [default: "."]',
        'thousands_separator' => /* @text */'Character to separate thousands [default: ","]',
        'template' => /* @text */'Template to format prices [default: "%symbol%price"]',
        '-h' => /* @text */'Show command help'
    )
);
