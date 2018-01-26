<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'ascc',
    'description' => /* @text */'Delete cached JS and CSS files',
    'usage' => array(
        'gplcart (asset-clear-cache | ascc) -h',
        'gplcart (asset-clear-cache | ascc)',
        'gplcart (asset-clear-cache | ascc) --js',
        'gplcart (asset-clear-cache | ascc) --css'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--js' => /* @text */'Delete only cached JS files',
        '--css' => /* @text */'Delete only cached CSS files'
    )
);
