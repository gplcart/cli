<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'ctget',
    'description' => /* @text */'Display one or several categories',
    'usage' => array(
        'gplcart (category-get | ctget) -h',
        'gplcart (category-get | ctget) [-f=<format> -l=<offset,limit>]',
        'gplcart (category-get | ctget) <category id> [-f=<format>]',
        'gplcart (category-get | ctget) <category group id> --group [-f=<format> -l=<offset,limit>]',
        'gplcart (category-get | ctget) <parent category id> --parent [-f=<format> -l=<offset,limit>]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-f' => /* @text */'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '--group' => /* @text */'Display all categories for the category group ID argument',
        '--parent' => /* @text */'Display all categories for the parent category ID argument'
    )
);
