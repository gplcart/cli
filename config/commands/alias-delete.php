<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'aldel',
    'access' => 'alias_delete',
    'description' => 'Delete one or several URL aliases', // @text
    'usage' => array(
        'gplcart (alias-delete | aldel) -h',
        'gplcart (alias-delete | aldel) --all [-u=<integer>]',
        'gplcart (alias-delete | aldel) <alias id> [-u=<integer>]',
        'gplcart (alias-delete | aldel) <entity name> --entity [-u=<integer>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--all' => 'Delete ALL URL aliases', // @text
        '--entity' => 'Delete ALL URL aliases with the entity name argument' // @text
    )
);
