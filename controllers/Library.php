<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use gplcart\core\Library as CoreLibrary;
use gplcart\modules\cli\controllers\Base;

/**
 * Handles commands related to 3-d party libraries
 */
class Library extends Base
{

    /**
     * Library class instance
     * @var \gplcart\core\Library $library
     */
    protected $library;

    /**
     * @param CoreLibrary $library
     */
    public function __construct(CoreLibrary $library)
    {
        parent::__construct();

        $this->library = $library;
    }

    /**
     * Callback for "library-cache-clear" command
     * Clear library cache
     */
    public function cmdCacheClearLibrary()
    {
        $this->library->clearCache();
        $this->output();
    }

    /**
     * Callback for "library-get" command
     * List one or a list of libraries
     */
    public function cmdGetLibrary()
    {
        $list = $this->getListLibrary();
        $this->outputFormat($list);
        $this->outputFormatTableLibrary($list);
        $this->output();
    }

    /**
     * Returns an array of libraries
     * @return array
     */
    protected function getListLibrary()
    {
        $library_id = $this->getParam(0);

        if (isset($library_id)) {
            $library = $this->library->get($library_id);
            if (empty($library)) {
                $this->errorExit($this->text('Invalid ID'));
            }
            return array($library);
        }

        $list = $this->library->getList();
        $this->limitArray($list);
        return $list;
    }

    /**
     * Output libraries in a table
     * @param array $items
     */
    protected function outputFormatTableLibrary(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('Name'),
            $this->text('Type'),
            $this->text('Version')
        );

        $rows = array();
        foreach ($items as $item) {
            $rows[] = array(
                $item['id'],
                $this->text($item['name']),
                $this->text($item['type']),
                $item['version']
            );
        }

        $this->outputFormatTable($rows, $header);
    }

}
