<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'rget',
    'access' => 'user_role',
    'description' => 'Display one or several user roles', // @text
    'usage' => array(
        'gplcart (role-get | rget) -h',
        'gplcart (role-get | rget) [-f=<format> -l=<offset,limit> -u=<int>]',
        'gplcart (role-get | rget) <role id> [-f=<format> -u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '-u' => 'Current user ID for access control', // @text
    )
);
