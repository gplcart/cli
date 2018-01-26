<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'adel',
    'description' => /* @text */'Delete one or several addresses',
    'usage' => array(
        'gplcart (address-delete | adel) -h',
        'gplcart (address-delete | adel) <address id>',
        'gplcart (address-delete | adel) <user id> --user'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--country' => /* @text */'Specifies that a user ID used instead of address ID'
    )
);
