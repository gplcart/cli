<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers\commands;

use gplcart\core\models\Module as ModuleModel;
use gplcart\core\Module as CoreModule;
use gplcart\modules\cli\controllers\Command;

/**
 * Handles commands related to modules
 */
class Module extends Command
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
     */
    public function cmdUninstallModule()
    {
        $result = $this->module_model->uninstall($this->getParam(0));

        if ($result !== true) {
            $this->errorAndExit($result);
        }

        $this->output();
    }

    /**
     * Callback for "module-install" command
     */
    public function cmdInstallModule()
    {
        $result = $this->module_model->install($this->getParam(0));

        if ($result !== true) {
            $this->errorAndExit($result);
        }

        $this->output();
    }

    /**
     * Callback for "module-off" command
     */
    public function cmdOffModule()
    {
        $id = $this->getParam(0);

        if (empty($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        $result = $this->module_model->disable($id);

        if ($result !== true) {
            $this->errorAndExit($result);
        }

        $this->output();
    }

    /**
     * Callback for "module-on" command
     */
    public function cmdOnModule()
    {
        $id = $this->getParam(0);

        if (empty($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        $result = $this->module_model->enable($id);

        if ($result !== true) {
            $this->errorAndExit($result);
        }

        $this->output();
    }

    /**
     * Callback for "module-clear" command
     */
    public function cmdClearModule()
    {
        $this->module->clearCache();
        $this->output();
    }

    /**
     * Callback for "module-get" command
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
        $id = $this->getParam(0);

        if (!isset($id)) {
            $list = $this->module->getList();
            $this->limitArray($list);
            return $list;
        }

        $module = $this->module->get($id);

        if (empty($module)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        return array($module);

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
