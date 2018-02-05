<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'codel',
    'description' => 'Delete country', // @text
    'usage' => array(
        'gplcart (country-delete | codel) -h',
        'gplcart (country-delete | codel) --all',
        'gplcart (country-delete | codel) <country code>'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--all' => 'Delete ALL countries if no ID argument specified' // @text
    )
);
