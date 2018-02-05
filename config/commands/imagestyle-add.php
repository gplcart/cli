<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'imadd',
    'description' => 'Add image style', // @text
    'usage' => array(
        'gplcart (imagestyle-add | imadd) -h',
        'gplcart (imagestyle-add | imadd)',
        'gplcart (imagestyle-add | imadd) (--name=<varchar> --status=<bool> --actions=<action1|action2>)'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--name' => 'Name', // @text
        '--status' => 'Status', // @text
        '--actions' => 'Image style actions, separated by pipe. Action format: [action ID][whitespace][comma separated params]' // @text
    )
);
