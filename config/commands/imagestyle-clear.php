<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'imc',
    'description' => 'Delete cached images for one or all image styles', // @text
    'usage' => array(
        'gplcart (imagestyle-clear | imc) -h',
        'gplcart (imagestyle-clear | imc) --all',
        'gplcart (imagestyle-clear | imc) <image style id>'
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--all' => 'Delete ALL cached images for all image styles if ID argument specified' // @text
    )
);
