<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'cset',
    'description' => /* @text */'Set configuration option',
    'usage' => array(
        'gplcart (config-set | cset) -h',
        'gplcart (config-set | cset) <id> <value>'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help'
    )
);
