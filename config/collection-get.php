<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'clget',
    'description' => /* @text */'Display one or several collections',
    'usage' => array(
        'gplcart (collection-get | clget) -h',
        'gplcart (collection-get | clget) [-f=<format> -l=<offset,limit>]',
        'gplcart (collection-get | clget) <collection id> [-f=<format>]',
        'gplcart (collection-get | clget) <type> --type [-f=<format> -l=<offset,limit>]',
        'gplcart (collection-get | clget) <store id> --store [-f=<format> -l=<offset,limit>]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-f' => /* @text */'Format of displayed data. Allowed values: print-r, var-export, var-dump, json, table [default: table]',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '--type' => /* @text */'Specifies that a collection type used instead of collection ID',
        '--store' => /* @text */'Specifies that a store ID used instead of collection ID',
    )
);
