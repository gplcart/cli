<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'imcc',
    'description' => /* @text */'Delete cached images for one or all image styles',
    'usage' => array(
        'gplcart (imagestyle-clear-cache | imcc) -h',
        'gplcart (imagestyle-clear-cache | imcc) --all',
        'gplcart (imagestyle-clear-cache | imcc) <image style id>'
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--all' => /* @text */'Delete ALL cached images for all image styles if ID argument specified'
    )
);
