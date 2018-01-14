<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'imadd',
    'description' => /* @text */'Add image style',
    'usage' => array(
        'gplcart (imagestyle-add | imadd) -h',
        'gplcart (imagestyle-add | imadd)',
        'gplcart (imagestyle-add | imadd) (--name=<name> --status=<bool> --actions=<action1|action2>)'
    ),
    'options' => array(
        '--name' => /* @text */'Image style name',
        '--status' => /* @text */'Enable / disable',
        '--actions' => /* @text */'Image style actions, separated by pipe. Action format: [action ID][whitespace][comma separated params]',
        '-h' => /* @text */'Show command help'
    )
);
