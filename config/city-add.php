<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
return array(
    'alias' => 'ciadd',
    'description' => /* @text */'Add city',
    'usage' => array(
        'gplcart (city-add | ciadd) -h',
        'gplcart (city-add | ciadd)',
        'gplcart (city-add | ciadd) (--name=<name> --state_id=<integer> --country=<code>) [--status=<boolean> --zone_id=<integer>]',
    ),
    'options' => array(
        '--name' => /* @text */'Name',
        '--state_id' => /* @text */'Country state ID',
        '--country' => /* @text */'County code',
        '--status' => /* @text */'Status [default: 0]',
        '--zone_id' => /* @text */'Zone ID [default: 0]',
        '-h' => /* @text */'Show command help'
    )
);
