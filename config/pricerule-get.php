<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'prget',
    'description' => /* @text */'Display one or several price rules',
    'usage' => array(
        'gplcart (pricerule-get | prget) -h',
        'gplcart (pricerule-get | prget) [-f=<format> -l=<offset,limit>]',
        'gplcart (pricerule-get | prget) <price rule id> [-f=<format>]',
        'gplcart (pricerule-get | prget) <trigger id> --trigger [-f=<format> -l=<offset,limit>]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-f' => /* @text */'Format of displayed data. Allowed values: print-r, var-export, var-dump, json, table [default: table]',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '--trigger' => /* @text */'Specifies that a trigger ID used instead of price rule ID'
    )
);
