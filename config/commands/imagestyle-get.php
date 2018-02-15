<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'imget',
    'access' => 'image_style',
    'description' => 'Display one or several image styles', // @text
    'usage' => array(
        'gplcart (imagestyle-get | imget) -h',
        'gplcart (imagestyle-get | imget) [-f=<format> -l=<offset,limit> -u=<int>]',
        'gplcart (imagestyle-get | imget) <imagestyle id> [-f=<format> -u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '-u' => 'Current user ID for access control', // @text
    )
);
