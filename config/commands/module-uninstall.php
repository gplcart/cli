<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'mu',
    'description' => 'Uninstall module', // @text
    'usage' => array(
        'gplcart (module-uninstall | mu) -h',
        'gplcart (module-uninstall | mu) <module id>'
    ),
    'options' => array(
        '-h' => 'Show command help' // @text
    )
);
