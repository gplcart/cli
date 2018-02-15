<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'imdel',
    'access' => 'image_style_delete',
    'description' => 'Delete image style', // @text
    'usage' => array(
        'gplcart (imagestyle-delete | imdel) -h',
        'gplcart (imagestyle-delete | imdel) <image style id> [-u=<int>]'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-u' => 'Current user ID for access control', // @text
    )
);
