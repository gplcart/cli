<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'trdel',
    'description' => 'Delete one or several triggers', // @text
    'usage' => array(
        'gplcart (trigger-delete | trdel) -h',
        'gplcart (trigger-delete | trdel) <trigger id>',
        'gplcart (trigger-delete | trdel) <store id> --store'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '-store' => 'Delete ALL triggers with the store ID argument' // @text
    )
);
