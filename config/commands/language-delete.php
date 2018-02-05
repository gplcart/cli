<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'ldel',
    'description' => 'Delete one or all languages', // @text
    'usage' => array(
        'gplcart (language-delete | ldel) -h',
        'gplcart (language-delete | ldel) --all',
        'gplcart (language-delete | ldel) <language code>'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--all' => 'Delete ALL languages if no language code specified', // @text
    )
);
