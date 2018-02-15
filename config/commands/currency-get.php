<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cuget',
    'access' => 'currency',
    'description' => 'Display one or several currencies', // @text
    'usage' => array(
        'gplcart (currency-get | cuget) -h',
        'gplcart (currency-get | cuget) <currency code> [-f=<format> -u=<int>]',
        'gplcart (currency-get | cuget) [-f=<format> -l=<offset,limit> -u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '-u' => 'Current user ID for access control', // @text
    )
);
