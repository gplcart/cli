<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'algen',
    'access' => 'admin',
    'description' => 'Generate one or several URL aliases', // @text
    'usage' => array(
        'gplcart (alias-generate | algen) -h',
        'gplcart (alias-generate | algen) <entity name> <entity id> [-u=<integer>]',
        'gplcart (alias-generate | algen) <entity name> --all [-u=<integer>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--all' => 'Generate URL aliases for ALL entities with the entity name argument' // @text
    )
);
