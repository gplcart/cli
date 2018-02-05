<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'trget',
    'description' => 'Display one or several triggers', // @text
    'usage' => array(
        'gplcart (trigger-get | trget) -h',
        'gplcart (trigger-get | trget) [-f=<format> -l=<offset,limit>]',
        'gplcart (trigger-get | trget) <trigger id> [-f=<format>]',
        'gplcart (trigger-get | trget) <store id> --store [-f=<format> -l=<offset,limit>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '--store' => 'Display all triggers with the store ID argument' // @text
    )
);
