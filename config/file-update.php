<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'fup',
    'description' => /* @text */'Update file',
    'usage' => array(
        'gplcart (file-update | fup) -h',
        'gplcart (file-update | fup) <file id> (--path=<varchar> | --title=<varchar> | --description=<text>
        | --entity=<varchar> | --entity_id=<int> | --mime_type=<varchar> | --file_type=<varchar> | --weight=<int>)',
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
        '--weight' => /* @text */'Position in lists',
    )
);
