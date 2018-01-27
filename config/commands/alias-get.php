<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'alget',
    'description' => /* @text */'Display one or several URL aliases',
    'usage' => array(
        'gplcart (alias-get | alget) -h',
        'gplcart (alias-get | alget) <alias id> [-f=<format>]',
        'gplcart (alias-get | alget) [-f=<format> -l=<offset,limit>]',
        'gplcart (alias-get | alget) <entity> [-f=<format> -l=<offset,limit>]'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-l' => /* @text */'Max number of displayed items [default: 100]',
        '-f' => /* @text */'Format of displayed data: print-r, var-export, var-dump, json, table [default: table]',
        '--entity' => /* @text */'Specifies that an entity name used instead of alias ID'
    )
);