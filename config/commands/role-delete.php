<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'rdel',
    'description' => 'Delete one or several roles', // @text
    'usage' => array(
        'gplcart (role-delete | rdel) -h',
        'gplcart (role-delete | rdel) --all',
        'gplcart (role-delete | rdel) <role id>'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--all' => 'Delete ALL user roles if no ID specified', // @text
    )
);
