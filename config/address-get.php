<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'aget',
    'description' => /* @text */'Display one or several user addresses',
    'usage' => array(
        'gplcart (address-get | aget) -h',
        'gplcart (address-get | aget) [-f=<format> -l=<number>]',
        'gplcart (address-get | aget) <address id> [-f=<format>]',
        'gplcart (address-get | aget) <user id> --user [-f=<format>]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-f' => /* @text */'Format of displayed data. Allowed values: print-r, var-export, var-dump, json, table [default: table]',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '--user' => /* @text */'Specifies that a user ID used instead of address ID',
    )
);
