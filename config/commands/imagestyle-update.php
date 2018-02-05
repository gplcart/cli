<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'imup',
    'description' => 'Update image style', // @text
    'usage' => array(
        'gplcart (imagestyle-update | imup) -h',
        'gplcart (imagestyle-update | imup) <imagestyle id> (--name=<name> | --status=<bool> | --actions=<action1|action2>)'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--name' => 'Name', // @text
        '--status' => 'Status', // @text
        '--actions' => 'Image style actions, separated by pipe. Action format: [action ID][whitespace][comma separated params]' // @text
    )
);
