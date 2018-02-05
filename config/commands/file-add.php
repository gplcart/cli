<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'fadd',
    'description' => 'Add file', // @text
    'usage' => array(
        'gplcart (file-add | fadd) -h',
        'gplcart (file-add | fadd)',
        'gplcart (file-add | fadd) --path=<varchar> [--title=<varchar> --description=<text>
        --entity=<varchar> --entity_id=<int> --mime_type=<varchar> --file_type=<varchar> --weight=<int>]',
    ),
    'options' => array(
        '-h' => 'Show command help', // @text
        '--path' => 'Path', // @text
        '--title' => 'Title', // @text
        '--entity' => 'Entity', // @text
        '--entity_id' => 'Entity ID', // @text
        '--mime_type' => 'MIME type', // @text
        '--file_type' => 'Type', // @text
        '--description' => 'Description', // @text
        '--weight' => 'Weight', // @text
    )
);
