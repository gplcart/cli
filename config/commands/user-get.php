<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'uget',
    'access' => 'user',
    'description' => 'Display one or several users', // @text
    'usage' => array(
        'gplcart (user-get | uget) -h',
        'gplcart (user-get | uget) [-f=<format> -l=<offset,limit> -u=<int>]',
        'gplcart (user-get | uget) <user id> [-f=<format> -u=<int>]',
        'gplcart (user-get | uget) <role id> --role [-f=<format> -l=<offset,limit> -u=<int>]',
        'gplcart (user-get | uget) <store id> --store [-f=<format> -l=<offset,limit> -u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '-u' => 'Current user ID for access control', // @text
        '--store' => 'Display all users with the store ID argument', // @text
        '--role' => 'Display all users with the role ID argument' // @text
    )
);
