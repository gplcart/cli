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
        '--all' => /* @text */'Delete all collections',
        '--type' => /* @text */'Specifies that a collection type used instead of collection ID',
        '--store' => /* @text */'Specifies that a store ID used instead of collection ID',
    )
);
