<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cldel',
    'description' => /* @text */'Delete one or several collections',
    'usage' => array(
        'gplcart (collection-delete | cldel) -h',
        'gplcart (collection-delete | cldel) --all',
        'gplcart (collection-delete | cldel) <collection id>',
        'gplcart (collection-delete | cldel) <collection type> --type',
        'gplcart (collection-delete | cldel) <collection store id> --store',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--all' => /* @text */'Delete ALL collections if no ID specified',
        '--type' => /* @text */'Delete ALL collections with the type argument',
        '--store' => /* @text */'Delete ALL collections with the store ID argument',
    )
);
