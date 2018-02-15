<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'codel',
    'access' => 'country_delete',
    'description' => 'Delete country', // @text
    'usage' => array(
        'gplcart (country-delete | codel) -h',
        'gplcart (country-delete | codel) --all [-u=<int>]',
        'gplcart (country-delete | codel) <country code> [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
        '--all' => 'Delete ALL countries if no ID argument specified' // @text
    )
);
