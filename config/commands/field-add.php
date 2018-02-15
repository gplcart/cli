<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'fdadd',
    'access' => 'field_add',
    'description' => 'Add field', // @text
    'usage' => array(
        'gplcart (field-add | fdadd) -h',
        'gplcart (field-add | fdadd) [-u=<int>]',
        'gplcart (field-add | fdadd) (--title=<varchar> --type=<varchar> --widget=<varchar>) [--status=<bool> -u=<int>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--title' => 'Title', // @text
        '--type' => 'Type', // @text
        '--widget' => 'Widget', // @text
        '--status' => 'Status' // @text
    )
);
