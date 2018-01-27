<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'trdel',
    'description' => /* @text */'Delete one or several triggers',
    'usage' => array(
        'gplcart (trigger-delete | trdel) -h',
        'gplcart (trigger-delete | trdel) <trigger id>',
        'gplcart (trigger-delete | trdel) <store id> --store'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '-store' => /* @text */'Delete ALL triggers with the store ID argument'
    )
);
