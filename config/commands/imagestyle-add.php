<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'imadd',
    'access' => 'image_style_add',
    'description' => 'Add image style', // @text
    'usage' => array(
        'gplcart (imagestyle-add | imadd) -h',
        'gplcart (imagestyle-add | imadd) [-u=<int>]',
        'gplcart (imagestyle-add | imadd) (--name=<varchar> --status=<bool> --actions=<action1|action2>) [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--name' => 'Name', // @text
        '--status' => 'Status', // @text
        '--actions' => 'Image style actions, separated by pipe. Action format: [action ID][whitespace][comma separated params]' // @text
    )
);
