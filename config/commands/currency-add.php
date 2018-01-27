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
        'gplcart (currency-add | cuadd)
        (--code=<code> --name=<varchar> --symbol=<varchar> --major_unit=<varchar> --minor_unit=<varchar>
        --numeric_code=<int>) [options]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--code' => /* @text */'Code',
        '--name' => /* @text */'Name',
        '--symbol' => /* @text */'Symbol',
        '--major_unit' => /* @text */'Major unit',
        '--minor_unit' => /* @text */'Minor unit',
        '--numeric_code' => /* @text */'Numeric code',
        '--status' => /* @text */'Status' . ' [default: 0]',
        '--default' => /* @text */'Default' . ' [default: 0]',
        '--decimals' => /* @text */'Decimals' . ' [default: 2]',
        '--rounding_step' => /* @text */'Rounding step' . ' [default: 0]',
        '--conversion_rate' => /* @text */'Conversion rate' . ' [default: 1]',
        '--decimal_separator' => /* @text */'Decimal separator' . ' [default: "."]',
        '--thousands_separator' => /* @text */'Thousands separator' . ' [default: ","]',
        '--template' => /* @text */'Template' . ' [default: "%symbol%price"]'
    )
);
