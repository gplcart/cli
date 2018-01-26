<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pron',
    'description' => /* @text */'Enable one or several price rules',
    'usage' => array(
        'gplcart (pricerule-on | pron) -h',
        'gplcart (pricerule-on | pron) --all',
        'gplcart (pricerule-on | pron) <price rule id>',
        'gplcart (pricerule-on | pron) <trigger id> --trigger',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--all' => /* @text */'Enable ALL price rules i no ID argument specified',
        '--trigger' => /* @text */'Enable ALL price rules with the trigger ID argument'
    )
);
