<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'coget',
    'description' => /* @text */'Display one or several countries',
    'usage' => array(
        'gplcart (country-get | coget) -h',
        'gplcart (country-get | coget) [-f=<format> -l=<number>]',
        'gplcart (country-get | coget) <country code> [-f=<format>]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-f' => /* @text */'Format of displayed data. Allowed values: print-r, var-export, var-dump, json, table [default: table]',
        '-l' => /* @text */'Max number of displayed items [default: 100]'
    )
);
