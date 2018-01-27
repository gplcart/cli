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
        'gplcart (state-get | csget) [-f=<format> -l=<offset,limit>]',
        'gplcart (state-get | csget) <state id> [-f=<format>]',
        'gplcart (state-get | csget) <country code> --country [-f=<format> -l=<offset,limit>]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '-f' => /* @text */'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]',
        '--country' => /* @text */'Display all country states with the country code argument'
    )
);
