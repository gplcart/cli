<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use gplcart\core\models\Store as StoreModel;
use gplcart\modules\cli\controllers\Base;

/**
 * Handles commands related to stores
 */
class Store extends Base
{

    /**
     * Store model instance
     * @var \gplcart\core\models\Store $store
     */
    protected $store;

    /**
     * @param StoreModel $store
     */
    public function __construct(StoreModel $store)
    {
        parent::__construct();

        $this->store = $store;
    }

    /**
     * Callback for "store-on" command
     */
    public function cmdOnStore()
    {
        $this->setStatusStore(true);
        $this->output();
    }

    /**
     * Callback for "store-off" command
     */
    public function cmdOffStore()
    {
        $this->setStatusStore(false);
        $this->output();
    }

    /**
     * Callback for "store-get" command
     */
    public function cmdGetStore()
    {
        $result = $this->getListStore();
        $this->outputFormat($result);
        $this->outputFormatTableStore($result);
        $this->output();
    }

    /**
     * Callback for "store-delete" command
     */
    public function cmdDeleteStore()
    {
        $id = $this->getParam(0);

        if (empty($id) || !is_numeric($id)) {
            $this->errorExit($this->text('Invalid ID'));
        }

        if (!$this->store->delete($id)) {
            $this->errorExit($this->text('An error occurred'));
        }

        $this->output();
    }

    /**
     * Callback for "store-add" command
     */
    public function cmdAddStore()
    {
        if ($this->getParam()) {
            $this->submitAddStore();
        } else {
            $this->wizardAddStore();
        }

        $this->output();
    }

    /**
     * Callback for "store-update" command
     */
    public function cmdUpdateStore()
    {
        $this->submitUpdateStore();
        $this->output();
    }

    /**
     * Sets status for one or several stores
     * @param bool $status
     */
    protected function setStatusStore($status)
    {
        $id = $this->getParam(0);
        $all = $this->getParam('all');

        if (empty($id) && empty($all)) {
            $this->errorExit($this->text('Invalid command'));
        }

        $result = false;

        if (!empty($id)) {
            if (!is_numeric($id)) {
                $this->errorExit($this->text('Invalid ID'));
            }

            $result = $this->store->update($id, array('status' => $status));

        } else if (!empty($all)) {
            $updated = $count = 0;
            foreach ((array)$this->store->getList() as $store) {
                $count++;
                $updated += (int)$this->store->update($store['store_id'], array('status' => $status));
            }

            $result = ($count == $updated);
        }

        if (!$result) {
            $this->errorExit($this->text('An error occurred'));
        }
    }

    /**
     * Returns an array of stores
     * @return array
     */
    protected function getListStore()
    {
        $id = $this->getParam(0);

        if (isset($id)) {
            $result = $this->store->get($id);
            if (empty($result)) {
                $this->errorExit($this->text('Invalid ID'));
            }
            return array($result);
        }

        $list = $this->store->getList();
        $this->limitItems($list);
        return $list;
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableStore(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('Name'),
            $this->text('Domain'),
            $this->text('Path'),
            $this->text('Enabled')
        );

        $rows = array();
        foreach ($items as $item) {
            $rows[] = array(
                $item['store_id'],
                $item['name'],
                $item['domain'],
                $item['basepath'],
                empty($item['status']) ? $this->text('No') : $this->text('Yes')
            );
        }

        $this->outputFormatTable($rows, $header);
    }

    /**
     * Updates a store
     */
    protected function submitUpdateStore()
    {
        $params = $this->getParam();

        if (empty($params[0]) || count($params) < 2) {
            $this->errorExit($this->text('Invalid command'));
        }

        $this->setSubmitted(null, $this->getParam());
        $this->setSubmitted('update', $params[0]);
        $this->setSubmittedDataStore();

        $this->validateComponent('store');
        $this->updateStore($params[0]);
    }

    /**
     * Updates a store
     * @param string $store_id
     */
    protected function updateStore($store_id)
    {
        if (!$this->isError() && !$this->store->update($store_id, $this->getSubmitted())) {
            $this->errorExit($this->text('Store has not been updated'));
        }
    }

    /**
     * Add a new store at once
     */
    protected function submitAddStore()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->setSubmittedDataStore();

        $this->validateComponent('store');
        $this->addStore();
    }

    /**
     * Add a store
     */
    protected function addStore()
    {
        if (!$this->isError()) {
            $id = $this->store->add($this->getSubmitted());
            if (empty($id)) {
                $this->errorExit($this->text('Store has not been added'));
            }
            $this->line($id);
        }
    }

    /**
     * Add a new store step by step
     */
    protected function wizardAddStore()
    {
        $this->validateInput('name', $this->text('Name'), 'store');
        $this->validateInput('domain', $this->text('Domain or IP'), 'store');
        $this->validateInput('basepath', $this->text('Path'), 'store', '');
        $this->validateInput('status', $this->text('Status'), 'store', 0);

        $this->setSubmittedDataStore();

        $this->validateComponent('store');
        $this->addStore();
    }

    /**
     * Sets decoded JSON for "data" field
     */
    protected function setSubmittedDataStore()
    {
        $json = $this->getSubmitted('data');

        if (isset($json)) {

            $decoded = json_decode($json, true);

            if (!is_array($decoded)) {
                // json_decode() returns null on invalid JSON
                // So we pass false to trigger validation error
                $decoded = false;
            }

            $this->setSubmitted('data', $decoded);
        }
    }
}
