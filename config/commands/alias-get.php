<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'alget',
    'access' => 'alias',
    'description' => 'Display one or several URL aliases', // @text
    'usage' => array(
        'gplcart (alias-get | alget) -h',
        'gplcart (alias-get | alget) <alias id> [-f=<format>] [-u=<integer>]',
        'gplcart (alias-get | alget) [-f=<format> -l=<offset,limit>] [-u=<integer>]',
        'gplcart (alias-get | alget) <entity> [-f=<format> -l=<offset,limit>] [-u=<integer>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '-u' => 'Current user ID for access control', // @text
        '--entity' => 'Display all aliases with the entity name argument' // @text
    )
);
