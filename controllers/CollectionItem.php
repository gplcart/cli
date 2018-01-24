<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use gplcart\core\models\CollectionItem as CollectionItemModel;

/**
 * Handles commands related to collection items
 */
class CollectionItem extends Base
{

    /**
     * Collection item model instance
     * @var \gplcart\core\models\CollectionItem $collection_item
     */
    protected $collection_item;

    /**
     * @param CollectionItemModel $collection_item
     */
    public function __construct(CollectionItemModel $collection_item)
    {
        parent::__construct();

        $this->collection_item = $collection_item;
    }

    /**
     * Callback for "collection-item-get" command
     */
    public function cmdGetCollectionItem()
    {
        $result = $this->getListCollectionItem();
        $this->outputFormat($result);
        $this->outputFormatTableCollectionItem($result);
        $this->output();
    }

    /**
     * Callback for "collection-item-delete" command
     */
    public function cmdDeleteCollectionItem()
    {
        $id = $this->getParam(0);

        if (empty($id) || !is_numeric($id)) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        $condition = $id;
        if ($this->getParam('collection')) {
            $condition = array('collection_id' => $id);
        }

        $result = $this->collection_item->delete($condition);

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->output();
    }

    /**
     * Callback for "collection-item-add" command
     */
    public function cmdAddCollectionItem()
    {
        if ($this->getParam()) {
            $this->submitAddCollectionItem();
        } else {
            $this->wizardAddCollectionItem();
        }

        $this->output();
    }

    /**
     * Callback for "collection-item-update" command
     */
    public function cmdUpdateCollectionItem()
    {
        $params = $this->getParam();

        if (empty($params[0]) || count($params) < 2) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        if (!is_numeric($params[0])) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        $this->setSubmitted(null, $params);
        $this->setSubmitted('update', $params[0]);
        $this->validateComponent('collection_item');

        $this->updateCollectionItem($params[0]);
        $this->output();
    }

    /**
     * Returns an array of collection items
     * @return array
     */
    protected function getListCollectionItem()
    {
        $id = $this->getParam(0);

        if (!isset($id)) {
            return $this->collection_item->getList(array('limit' => $this->getLimit()));
        }

        if (!is_numeric($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        if ($this->getParam('collection')) {
            return $this->collection_item->getList(array('collection_id' => $id, 'limit' => $this->getLimit()));
        }

        $result = $this->collection_item->get($id);

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        return array($result);
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableCollectionItem(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('Collection ID'),
            $this->text('Value'),
            $this->text('Weight'),
            $this->text('Enabled')
        );

        $rows = array();

        foreach ($items as $item) {
            $rows[] = array(
                $item['collection_item_id'],
                $item['collection_id'],
                $item['value'],
                $item['weight'],
                empty($item['status']) ? $this->text('No') : $this->text('Yes')
            );
        }

        $this->outputFormatTable($rows, $header);
    }

    /**
     * Add a new collection item
     */
    protected function addCollectionItem()
    {
        if (!$this->isError()) {
            $id = $this->collection_item->add($this->getSubmitted());
            if (empty($id)) {
                $this->errorAndExit($this->text('Unexpected result'));
            }
            $this->line($id);
        }
    }

    /**
     * Updates a collection item
     * @param string $collection_item_id
     */
    protected function updateCollectionItem($collection_item_id)
    {
        if (!$this->isError() && !$this->collection_item->update($collection_item_id, $this->getSubmitted())) {
            $this->errorAndExit($this->text('Unexpected result'));
        }
    }

    /**
     * Add a new collection item at once
     */
    protected function submitAddCollectionItem()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->validateComponent('collection_item');
        $this->addCollectionItem();
    }

    /**
     * Add a collection item step by step
     */
    protected function wizardAddCollectionItem()
    {
        $this->validatePrompt('collection_id', $this->text('Collection ID'), 'collection_item');
        $this->validatePrompt('entity_id', $this->text('Entity ID'), 'collection_item');
        $this->validatePrompt('weight', $this->text('Weight'), 'collection_item', 0);
        $this->validatePrompt('status', $this->text('Status'), 'collection_item', 0);
        $this->validatePrompt('data', $this->text('Data'), 'collection_item');

        $this->validateComponent('collection_item');
        $this->addCollectionItem();
    }

}
