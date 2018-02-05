<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cldel',
    'description' => 'Delete one or several collections', // @text
    'usage' => array(
        'gplcart (collection-delete | cldel) -h',
        'gplcart (collection-delete | cldel) --all',
        'gplcart (collection-delete | cldel) <collection id>',
        'gplcart (collection-delete | cldel) <collection type> --type',
        'gplcart (collection-delete | cldel) <collection store id> --store',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--all' => 'Delete ALL collections if no ID specified', // @text
        '--type' => 'Delete ALL collections with the type argument', // @text
        '--store' => 'Delete ALL collections with the store ID argument', // @text
    )
);
