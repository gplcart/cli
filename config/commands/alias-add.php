<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'aladd',
    'description' => 'Add URL alias', // @text
    'usage' => array(
        'gplcart (alias-add | aladd) -h',
        'gplcart (alias-add | aladd) <entity name> <entity id> <alias>'
    ),
    'options' => array(
        '-h' => 'Show command help' // @text
    )
);
