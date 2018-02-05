<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pron',
    'description' => 'Enable one or several price rules', // @text
    'usage' => array(
        'gplcart (pricerule-on | pron) -h',
        'gplcart (pricerule-on | pron) --all',
        'gplcart (pricerule-on | pron) <price rule id>',
        'gplcart (pricerule-on | pron) <trigger id> --trigger',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--all' => 'Enable ALL price rules i no ID argument specified', // @text
        '--trigger' => 'Enable ALL price rules with the trigger ID argument' // @text
    )
);
