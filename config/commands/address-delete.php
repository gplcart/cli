<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'adel',
    'description' => 'Delete one or several addresses', // @text
    'usage' => array(
        'gplcart (address-delete | adel) -h',
        'gplcart (address-delete | adel) <address id>',
        'gplcart (address-delete | adel) <user id> --user'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--user' => 'Delete ALL addresses with the user ID argument' // @text
    )
);
