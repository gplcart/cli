<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'algen',
    'description' => /* @text */'Generate one or several URL aliases',
    'usage' => array(
        'gplcart (alias-generate | algen) -h',
        'gplcart (alias-generate | algen) <entity name> <entity id>',
        'gplcart (alias-generate | algen) <entity name> --all'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--all' => /* @text */'Generate URL aliases for ALL entities with the entity name'
    )
);
