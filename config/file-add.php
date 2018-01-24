<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'fadd',
    'description' => /* @text */'Add file',
    'usage' => array(
        'gplcart (file-add | fadd) -h',
        'gplcart (file-add | fadd)',
        'gplcart (file-add | fadd) --path=<varchar> [--title=<varchar> --description=<text>
        --entity=<varchar> --entity_id=<int> --mime_type=<varchar> --file_type=<varchar> --weight=<int>]',
    ),
    'options' => array(
        '-h' => /* @text */'Show command help',
        '--path' => /* @text */'Absolute or relative to file directory path',
        '--title' => /* @text */'Title',
        '--description' => /* @text */'Description',
        '--entity' => /* @text */'Entity',
        '--entity_id' => /* @text */'Entity ID',
        '--mime_type' => /* @text */'MIME type',
        '--file_type' => /* @text */'File type',
        '--weight' => /* @text */'Position in lists [default: 0]',
    )
);
