<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pgget',
    'access' => 'page',
    'description' => 'Display one or several pages', // @text
    'usage' => array(
        'gplcart (page-get | pgget) -h',
        'gplcart (page-get | pgget) <page id> [-f=<format> -u=<int>]',
        'gplcart (page-get | pgget) [-f=<format> -l=<offset,limit> -u=<int>]',
        'gplcart (page-get | pgget) <user id> --user [-f=<format> -l=<offset,limit> -u=<int>]',
        'gplcart (page-get | pgget) <store id> --store [-f=<format> -l=<offset,limit> -u=<int>]',
        'gplcart (page-get | pgget) <category id> --category [-f=<format> -l=<offset,limit> -u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-f' => 'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]', // @text
        '-l' => 'Max number of displayed items [default: 100]', // @text
        '-u' => 'Current user ID for access control', // @text
        '--user' => 'Display all pages with the user ID argument', // @text
        '--store' => 'Display all pages with the store ID argument', // @text
        '--category' => 'Display all pages with the category ID argument', // @text
    )
);
