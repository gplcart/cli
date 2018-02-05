<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'asc',
    'description' => 'Delete cached JS and CSS files', // @text
    'usage' => array(
        'gplcart (asset-clear | asc) -h',
        'gplcart (asset-clear | asc)',
        'gplcart (asset-clear | asc) --js',
        'gplcart (asset-clear | asc) --css'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--js' => 'Delete only cached JS files', // @text
        '--css' => 'Delete only cached CSS files' // @text
    )
);
