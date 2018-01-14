<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'imget',
    'description' => /* @text */'Display one or several image styles',
    'usage' => array(
        'gplcart (imagestyle-get | imget) -h',
        'gplcart (imagestyle-get | imget) [-f=<format> -l=<number>]',
        'gplcart (imagestyle-get | imget) <imagestyle id> [-f=<format>]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '-f' => /* @text */'Format of displayed data. Allowed values: print-r, var-export, var-dump, json, table [default: table]'
    )
);
