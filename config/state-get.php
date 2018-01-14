<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'csget',
    'description' => /* @text */'Display one or several country states',
    'usage' => array(
        'gplcart (state-get | csget) -h',
        'gplcart (state-get | csget) [-f=<format> -l=<number>]',
        'gplcart (state-get | csget) <state id> [-f=<format>]',
        'gplcart (state-get | csget) <country code> --country [-f=<format>]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-f' => /* @text */'Format of displayed data. Allowed values: print-r, var-export, var-dump, json, table [default: table]',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '--country' => /* @text */'Specifies that a country code used instead of coutry state ID',
    )
);
