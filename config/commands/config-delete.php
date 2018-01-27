<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cdel',
    'description' => /* @text */'Delete configuration option',
    'usage' => array(
        'gplcart (config-delete | cdel) -h',
        'gplcart (config-delete | cdel) <id>'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help'
    )
);
