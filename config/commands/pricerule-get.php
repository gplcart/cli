<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'prget',
    'description' => 'Display one or several price rules', // @text
    'usage' => array(
        'gplcart (pricerule-get | prget) -h',
        'gplcart (pricerule-get | prget) [-f=<format> -l=<offset,limit>]',
        'gplcart (pricerule-get | prget) <price rule id> [-f=<format>]',
        'gplcart (pricerule-get | prget) <trigger id> --trigger [-f=<format> -l=<offset,limit>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '--trigger' => 'Display all price rules with the trigger ID argument' // @text
    )
);
