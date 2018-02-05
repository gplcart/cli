<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'fdup',
    'description' => 'Update field', // @text
    'usage' => array(
        'gplcart (field-update | fdup) -h',
        'gplcart (field-update | fdup) <field id>
        (--title=<varchar> | --type=<varchar> | --widget=<varchar> | --status=<boolean>)',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--title' => 'Title', // @text
        '--type' => 'Type', // @text
        '--widget' => 'Widget', // @text
        '--status' => 'Status' // @text
    )
);
