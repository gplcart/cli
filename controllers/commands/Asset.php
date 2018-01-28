<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers\commands;

use DirectoryIterator;
use gplcart\modules\cli\controllers\Command;

/**
 * Handles commands related to asset files (JS and CSS)
 */
class Asset extends Command
{

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Callback for "asset-clear" command
     */
    public function cmdClearAsset()
    {
        $params = $this->getParam();

        if (empty($params)) {
            foreach (new DirectoryIterator(GC_DIR_ASSET_COMPILED) as $file) {
                if ($file->isDir() && !$file->isDot()) {
                    gplcart_file_delete_recursive($file->getRealPath());
                }
            }
        } else {

            $file = null;

            if (!empty($params['css'])) {
                $file = GC_DIR_ASSET_COMPILED . '/css';
            } else if (!empty($params['js'])) {
                $file = GC_DIR_ASSET_COMPILED . '/js';
            }

            if (empty($file) || !is_dir($file)) {
                $this->errorAndExit($this->text('Invalid command'));
            }

            gplcart_file_delete_recursive($file);
        }

        $this->output();
    }

}
