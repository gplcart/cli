<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pgget',
    'description' => /* @text */'Display one or several pages',
    'usage' => array(
        'gplcart (page-get | pgget) -h',
        'gplcart (page-get | pgget) <page id> [-f=<format>]',
        'gplcart (page-get | pgget) [-f=<format> -l=<offset,limit>]',
        'gplcart (page-get | pgget) <user id> --user [-f=<format> -l=<offset,limit>]',
        'gplcart (page-get | pgget) <store id> --store [-f=<format> -l=<offset,limit>]',
        'gplcart (page-get | pgget) <category id> --category [-f=<format> -l=<offset,limit>]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-f' => /* @text */'Format of displayed data. Allowed values: print-r, var-export, var-dump, json, table [default: table]',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '--user' => /* @text */'Specifies that a user ID used instead of page ID',
        '--store' => /* @text */'Specifies that a store ID used instead of page ID',
        '--category' => /* @text */'Specifies that a category ID used instead of page ID',
    )
);
