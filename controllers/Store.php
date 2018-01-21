<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use gplcart\core\models\Store as StoreModel;

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
            $this->errorAndExit($this->text('Invalid ID'));
        }

        if (!$this->store->delete($id)) {
            $this->errorAndExit($this->text('An error occurred'));
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
        $params = $this->getParam();

        if (empty($params[0]) || count($params) < 2) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        if (!is_numeric($params[0])) {
            $this->errorAndExit($this->text('Invalid ID'));
        }

        $this->setSubmitted(null, $params);
        $this->setSubmitted('update', $params[0]);
        $this->setSubmittedJson('data');

        $this->validateComponent('store');

        $this->updateStore($params[0]);
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

        if (!isset($id) && empty($all)) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        $result = false;

        if (isset($id)) {

            if (!is_numeric($id)) {
                $this->errorAndExit($this->text('Invalid ID'));
            }

            $result = $this->store->update($id, array('status' => $status));

        } else if (!empty($all)) {

            $updated = $count = 0;
            foreach ((array) $this->store->getList() as $store) {
                $count++;
                $updated += (int) $this->store->update($store['store_id'], array('status' => $status));
            }

            $result = $count && $count == $updated;
        }

        if (!$result) {
            $this->errorAndExit($this->text('An error occurred'));
        }
    }

    /**
     * Returns an array of stores
     * @return array
     */
    protected function getListStore()
    {
        $id = $this->getParam(0);

        if (!isset($id)) {
            return $this->store->getList(array('limit' => $this->getLimit()));
        }

        if (!is_numeric($id)) {
            $this->errorAndExit($this->text('Invalid ID'));
        }

        $result = $this->store->get($id);

        if (empty($result)) {
            $this->errorAndExit($this->text('Invalid ID'));
        }

        return array($result);
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
     * @param string $store_id
     */
    protected function updateStore($store_id)
    {
        if (!$this->isError() && !$this->store->update($store_id, $this->getSubmitted())) {
            $this->errorAndExit($this->text('An error occurred'));
        }
    }

    /**
     * Add a new store at once
     */
    protected function submitAddStore()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->setSubmittedJson('data');

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
                $this->errorAndExit($this->text('An error occurred'));
            }
            $this->line($id);
        }
    }

    /**
     * Add a new store step by step
     */
    protected function wizardAddStore()
    {
        $this->validatePrompt('name', $this->text('Name'), 'store');
        $this->validatePrompt('domain', $this->text('Domain or IP'), 'store');
        $this->validatePrompt('basepath', $this->text('Path'), 'store', '');
        $this->validatePrompt('status', $this->text('Status'), 'store', 0);
        $this->setSubmittedJson('data');

        $this->validateComponent('store');
        $this->addStore();
    }
}
