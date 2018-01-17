<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'trget',
    'description' => /* @text */'Display one or several triggers',
    'usage' => array(
        'gplcart (trigger-get | trget) -h',
        'gplcart (trigger-get | trget) [-f=<format> -l=<number>]',
        'gplcart (trigger-get | trget) <trigger id> [-f=<format>]',
        'gplcart (trigger-get | trget) <store id> --store [-f=<format>]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-f' => /* @text */'Format of displayed data. Allowed values: print-r, var-export, var-dump, json, table [default: table]',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '--store' => /* @text */'Specifies that a store ID used instead of trigger ID'
    )
);
