<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers\commands;

use gplcart\modules\cli\controllers\Command;

/**
 * Handles commands related to system configuration
 */
class Config extends Command
{
    /**
     * Callback for "config-get" command
     */
    public function cmdGetConfig()
    {
        $result = $this->getListConfig();
        $this->outputFormat($result);
        $this->outputFormatTableConfig($result);
        $this->output();
    }

    /**
     * Returns an array of configurations
     * @return array
     */
    protected function getListConfig()
    {
        $name = $this->getParam(0);

        if (isset($name)) {
            $result = $this->config->get($name);
            if (!isset($result)) {
                $this->errorAndExit($this->text('Invalid argument'));
            }
            $list = array($name => $result);
        } else {
            $list = $this->config->get();
            $this->limitArray($list);
        }

        $saved = $this->config->select();

        $reindexed = array();
        foreach ($list as $key => $value) {
            $reindexed[] = array(
                'key' => $key,
                'value' => $value,
                'in_database' => isset($saved[$key])
            );
        }

        return $reindexed;
    }

    /**
     * Callback for "config-delete" command
     */
    public function cmdDeleteConfig()
    {
        $id = $this->getParam(0);

        if (!isset($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        if (!$this->config->reset($id)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->output();
    }

    /**
     * Callback for "config-set" command
     */
    public function cmdSetConfig()
    {
        $key = $this->getParam(0);
        $value = $this->getParam(1);

        if (!isset($key) || !isset($value)) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        if (!$this->config->set($key, $value)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->output();
    }

    /**
     * Output table format
     * @param mixed $items
     */
    protected function outputFormatTableConfig($items)
    {
        $header = array(
            $this->text('Name'),
            $this->text('Value'),
            $this->text('In database'),
        );

        $rows = array();

        foreach ($items as $item) {
            $rows[] = array(
                $item['key'],
                $item['value'],
                empty($item['in_database']) ? $this->text('No') : $this->text('Yes')
            );
        }

        $this->outputFormatTable($rows, $header);
    }

}
