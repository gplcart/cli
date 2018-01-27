<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'pcdel',
    'description' => /* @text */'Delete one or several product classes',
    'usage' => array(
        'gplcart (product-class-delete | pcdel) -h',
        'gplcart (product-class-delete | pcdel) --all',
        'gplcart (product-class-delete | pcdel) <product class id>'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--all' => /* @text */'Delete ALL product classes if no ID specified'
    )
);
