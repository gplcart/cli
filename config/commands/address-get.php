<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'aget',
    'description' => 'Display one or several user addresses', // @text
    'usage' => array(
        'gplcart (address-get | aget) -h',
        'gplcart (address-get | aget) [-f=<format> -l=<offset,limit>]',
        'gplcart (address-get | aget) <address id> [-f=<format>]',
        'gplcart (address-get | aget) <user id> --user [-f=<format> -l=<offset,limit>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '--user' => 'Display all addresses with the user ID argument', // @text
    )
);
