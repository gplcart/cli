<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'uget',
    'description' => /* @text */'Display one or several users',
    'usage' => array(
        'gplcart (user-get | uget) -h',
        'gplcart (user-get | uget) [-f=<format> -l=<offset,limit>]',
        'gplcart (user-get | uget) <user id> [-f=<format>]',
        'gplcart (user-get | uget) <role id> --role [-f=<format> -l=<offset,limit>]',
        'gplcart (user-get | uget) <store id> --store [-f=<format> -l=<offset,limit>]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '-f' => /* @text */'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]',
        '--store' => /* @text */'Display all users with the store ID argument',
        '--role' => /* @text */'Display all users with the role ID argument'
    )
);
