<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use gplcart\core\Module as CoreModule;
use gplcart\core\models\Module as ModuleModel;
use gplcart\modules\cli\controllers\Base;

/**
 * Handles commands related to modules
 */
class Module extends Base
{

    /**
     * Module class instance
     * @var \gplcart\core\Module $module
     */
    protected $module;

    /**
     * Module model instance
     * @var \gplcart\core\models\Module $module_model
     */
    protected $module_model;

    /**
     * @param CoreModule $module
     * @param ModuleModel $module_model
     */
    public function __construct(CoreModule $module, ModuleModel $module_model)
    {
        parent::__construct();

        $this->module = $module;
        $this->module_model = $module_model;
    }

    /**
     * Callback for "module-uninstall" command
     * Uninstall a module
     */
    public function cmdUninstallModule()
    {
        $result = $this->module_model->uninstall($this->getParam(0));

        if ($result !== true) {
            $this->errorExit($result);
        }

        $this->output();
    }

    /**
     * Callback for "module-install" command
     * Install a module
     */
    public function cmdInstallModule()
    {
        $result = $this->module_model->install($this->getParam(0));

        if ($result !== true) {
            $this->errorExit($result);
        }

        $this->output();
    }

    /**
     * Callback for "module-off" command
     * Disables a module
     */
    public function cmdOffModule()
    {
        $id = $this->getParam(0);

        if (empty($id)) {
            $this->errorExit($this->text('Invalid ID'));
        }

        $result = $this->module_model->disable($id);

        if ($result !== true) {
            $this->errorExit($result);
        }

        $this->output();
    }

    /**
     * Callback for "module-on" command
     * Enables a module
     */
    public function cmdOnModule()
    {
        $id = $this->getParam(0);

        if (empty($id)) {
            $this->errorExit($this->text('Invalid ID'));
        }

        $result = $this->module_model->enable($id);

        if ($result !== true) {
            $this->errorExit($result);
        }

        $this->output();
    }

    /**
     * Callback for "module-cache-clear" command
     * Clear module cache
     */
    public function cmdCacheClearModule()
    {
        $this->module->clearCache();
        $this->output();
    }

    /**
     * Callback for "module-get" command
     * Displays one or all modules
     */
    public function cmdGetModule()
    {
        $result = $this->getListModule();
        $this->outputFormat($result);
        $this->outputFormatTableModule($result);
        $this->output();
    }

    /**
     * Returns an array of modules
     * @return array
     */
    protected function getListModule()
    {
        $module_id = $this->getParam(0);

        if (isset($module_id)) {
            $module = $this->module->get($module_id);
            if (empty($module)) {
                $this->errorExit($this->text('Invalid ID'));
            }
            return array($module);
        }

        $list = $this->module->getList();
        $this->limitItems($list);
        return $list;
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableModule(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('Name'),
            $this->text('Version'),
            $this->text('Type'),
            $this->text('Enabled'),
            $this->text('Installed')
        );

        $rows = array();
        foreach ($items as $item) {
            $rows[] = array(
                $item['module_id'],
                $this->text($item['name']),
                isset($item['version']) ? $item['version'] : $this->text('Unknown'),
                $this->text($item['type']),
                empty($item['status']) ? $this->text('No') : $this->text('Yes'),
                empty($item['installed']) ? $this->text('No') : $this->text('Yes')
            );
        }

        $this->outputFormatTable($rows, $header);
    }

}