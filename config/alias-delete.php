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
        'gplcart (alias-delete | aldel) <entity> --entity'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--all' => /* @text */'Delete all URL aliases',
        '--entity' => /* @text */'Specifies that an entity name used instead of alias ID',
    )
);
