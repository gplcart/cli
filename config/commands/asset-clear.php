<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'asc',
    'access' => 'admin',
    'description' => 'Delete cached JS and CSS files', // @text
    'usage' => array(
        'gplcart (asset-clear | asc) -h',
        'gplcart (asset-clear | asc) [-u=<integer>]',
        'gplcart (asset-clear | asc) --js [-u=<integer>]',
        'gplcart (asset-clear | asc) --css [-u=<integer>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--js' => 'Delete only cached JS files', // @text
        '--css' => 'Delete only cached CSS files' // @text
    )
);
