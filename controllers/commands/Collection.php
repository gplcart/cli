<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers\commands;

use gplcart\core\models\Collection as CollectionModel;
use gplcart\modules\cli\controllers\Command;

/**
 * Handles commands related to collections
 */
class Collection extends Command
{

    /**
     * Collection model instance
     * @var \gplcart\core\models\Collection $collection
     */
    protected $collection;

    /**
     * @param CollectionModel $collection
     */
    public function __construct(CollectionModel $collection)
    {
        parent::__construct();

        $this->collection = $collection;
    }

    /**
     * Callback for "collection-get" command
     */
    public function cmdGetCollection()
    {
        $result = $this->getListCollection();
        $this->outputFormat($result);
        $this->outputFormatTableCollection($result);
        $this->output();
    }

    /**
     * Callback for "collection-delete" command
     */
    public function cmdDeleteCollection()
    {
        $id = $this->getParam(0);
        $all = $this->getParam('all');

        if (empty($id) && empty($all)) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        $options = null;

        if (isset($id)) {

            if ($this->getParam('type')) {
                $options = array('type' => $id);
            } else if ($this->getParam('store')) {

                if (!is_numeric($id)) {
                    $this->errorAndExit($this->text('Invalid argument'));
                }

                $options = array('store_id' => $id);
            }

        } else if (!empty($all)) {
            $options = array();
        }

        if (isset($options)) {

            $deleted = $count = 0;
            foreach ($this->collection->getList($options) as $item) {
                $count++;
                $deleted += (int) $this->collection->delete($item['collection_id']);
            }

            $result = $count && $count == $deleted;

        } else {

            if (!is_numeric($id)) {
                $this->errorAndExit($this->text('Invalid argument'));
            }

            $result = $this->collection->delete($id);
        }

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->output();
    }

    /**
     * Callback for "collection-add" command
     */
    public function cmdAddCollection()
    {
        if ($this->getParam()) {
            $this->submitAddCollection();
        } else {
            $this->wizardAddCollection();
        }

        $this->output();
    }

    /**
     * Callback for "collection-update" command
     */
    public function cmdUpdateCollection()
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
        $this->validateComponent('collection');

        $this->updateCollection($params[0]);
        $this->output();
    }

    /**
     * Returns an array of collections
     * @return array
     */
    protected function getListCollection()
    {
        $id = $this->getParam(0);

        if (!isset($id)) {
            return $this->collection->getList(array('limit' => $this->getLimit()));
        }

        if ($this->getParam('type')) {
            return $this->collection->getList(array('type' => $id, 'limit' => $this->getLimit()));
        }

        if (!is_numeric($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        if ($this->getParam('store')) {
            return $this->collection->getList(array('store_id' => $id, 'limit' => $this->getLimit()));
        }

        $result = $this->collection->get($id);

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        return array($result);
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableCollection(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('Name'),
            $this->text('Type'),
            $this->text('Store'),
            $this->text('Enabled')
        );

        $rows = array();

        foreach ($items as $item) {
            $rows[] = array(
                $item['collection_id'],
                $item['title'],
                $item['type'],
                $item['store_id'],
                empty($item['status']) ? $this->text('No') : $this->text('Yes')
            );
        }

        $this->outputFormatTable($rows, $header);
    }

    /**
     * Add a new collection
     */
    protected function addCollection()
    {
        if (!$this->isError()) {
            $id = $this->collection->add($this->getSubmitted());
            if (empty($id)) {
                $this->errorAndExit($this->text('Unexpected result'));
            }
            $this->line($id);
        }
    }

    /**
     * Updates a collection
     * @param string $collection_id
     */
    protected function updateCollection($collection_id)
    {
        if (!$this->isError() && !$this->collection->update($collection_id, $this->getSubmitted())) {
            $this->errorAndExit($this->text('Unexpected result'));
        }
    }

    /**
     * Add a new collection at once
     */
    protected function submitAddCollection()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->validateComponent('collection');
        $this->addCollection();
    }

    /**
     * Add a new collection step by step
     */
    protected function wizardAddCollection()
    {
        $this->validatePrompt('title', $this->text('Title'), 'collection');
        $this->validateMenu('type', $this->text('Type'), 'collection', $this->collection->getTypes());
        $this->validatePrompt('store_id', $this->text('Store'), 'collection');
        $this->validatePrompt('description', $this->text('Description'), 'collection', '');
        $this->validatePrompt('status', $this->text('Status'), 'collection', 0);

        $this->validateComponent('collection');
        $this->addCollection();
    }

}
