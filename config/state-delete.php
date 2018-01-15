<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'csdel',
    'description' => /* @text */'Delete one or several country states',
    'usage' => array(
        'gplcart (state-delete | csdel) -h',
        'gplcart (state-delete | csdel) <state id>',
        'gplcart (state-delete | csdel) <country code> --country'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--country' => /* @text */'Specifies that a country code used instead of country state id. All states will be deleted for the country'
    )
);
