<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use gplcart\core\Cache as CoreCache;

/**
 * Handles commands related to system cache
 */
class Cache extends Base
{

    /**
     * Cache class instance
     * @var \gplcart\core\Cache $cache
     */
    protected $cache;

    /**
     * @param CoreCache $cache
     */
    public function __construct(CoreCache $cache)
    {
        parent::__construct();

        $this->cache = $cache;
    }

    /**
     * Callback for "cache-clear" command
     */
    public function cmdClearCache()
    {
        $id = $this->getParam(0);
        $all = $this->getParam('all');

        if (!isset($id) && empty($all)) {
            $this->errorExit($this->text('Invalid command'));
        }

        $result = false;

        if (isset($id)) {
            $pattern = $this->getParam('pattern');
            if (isset($pattern)) {
                $result = $this->cache->clear($id, array('pattern' => $pattern));
            } else {
                $result = $this->cache->clear($id);
            }
        } else if ($all) {
            $result = $this->cache->clear(null);
        }

        if (!$result) {
            $this->errorExit($this->text('An error occurred'));
        }

        $this->output();
    }

}
