<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'aldel',
    'description' => /* @text */'Delete one or several URL aliases',
    'usage' => array(
        'gplcart (alias-delete | aldel) -h',
        'gplcart (alias-delete | aldel) --all',
        'gplcart (alias-delete | aldel) <alias id>',
        'gplcart (alias-delete | aldel) <entity name> --entity'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--all' => /* @text */'Delete ALL URL aliases',
        '--entity' => /* @text */'Delete ALL URL aliases with the entity name'
    )
);
