<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use DirectoryIterator;

/**
 * Handles commands related to asset files (JS and CSS)
 */
class Asset extends Base
{

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Callback for "asset-cache-clear" command
     */
    public function cmdCacheClearAsset()
    {
        $type = $this->getParam(0);

        if (empty($type)) {
            foreach (new DirectoryIterator(GC_DIR_ASSET_COMPILED) as $file) {
                if ($file->isDir() && !$file->isDot()) {
                    gplcart_file_delete_recursive($file->getRealPath());
                }
            }
        } else {
            $file = GC_DIR_ASSET_COMPILED . "/$type";
            if (!is_dir($file)) {
                $this->errorAndExit($this->text('Invalid command'));
            }
            gplcart_file_delete_recursive($file);
        }

        $this->output();
    }

}
