<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers\commands;

use gplcart\core\models\CategoryGroup as CategoryGroupModel;
use gplcart\modules\cli\controllers\Command;

/**
 * Handles commands related to category groups
 */
class CategoryGroup extends Command
{

    /**
     * Category group model instance
     * @var \gplcart\core\models\CategoryGroup $category_group
     */
    protected $category_group;

    /**
     * @param CategoryGroupModel $category_group
     */
    public function __construct(CategoryGroupModel $category_group)
    {
        parent::__construct();

        $this->category_group = $category_group;
    }

    /**
     * Callback for "category-group-get" command
     */
    public function cmdGetCategoryGroup()
    {
        $result = $this->getListCategoryGroup();
        $this->outputFormat($result);
        $this->outputFormatTableCategoryGroup($result);
        $this->output();
    }

    /**
     * Callback for "category-group-delete" command
     */
    public function cmdDeleteCategoryGroup()
    {
        $id = $this->getParam(0);
        $all = $this->getParam('all');

        if (!isset($id) && !$all) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        $options = $result = null;

        if (isset($id)) {

            if ($this->getParam('type')) {
                $options = array('type' => $id);
            } else if ($this->getParam('store') && is_numeric($id)) {
                $options = array('store_id' => $id);
            }

        } else if ($all) {
            $options = array();
        }

        if (isset($options)) {
            $deleted = $count = 0;
            foreach ($this->category_group->getList($options) as $item) {
                $count++;
                $deleted += (int) $this->category_group->delete($item['category_group_id']);
            }

            $result = $count && $count == $deleted;
        } else if (is_numeric($id)) {
            $result = $this->category_group->delete($id);
        }

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->output();
    }

    /**
     * Callback for "category-group-add" command
     */
    public function cmdAddCategoryGroup()
    {
        if ($this->getParam()) {
            $this->submitAddCategoryGroup();
        } else {
            $this->wizardAddCategoryGroup();
        }

        $this->output();
    }

    /**
     * Callback for "category-group-update" command
     */
    public function cmdUpdateCategoryGroup()
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
        $this->validateComponent('category_group');

        $this->updateCategoryGroup($params[0]);
        $this->output();
    }

    /**
     * Returns an array of category groups
     * @return array
     */
    protected function getListCategoryGroup()
    {
        $id = $this->getParam(0);

        if (!isset($id)) {
            return $this->category_group->getList(array('limit' => $this->getLimit()));
        }

        if ($this->getParam('type')) {
            return $this->category_group->getList(array('type' => $id, 'limit' => $this->getLimit()));
        }

        if (!is_numeric($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        if ($this->getParam('store')) {
            return $this->category_group->getList(array('store_id' => $id, 'limit' => $this->getLimit()));
        }

        $result = $this->category_group->get($id);

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        return array($result);
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableCategoryGroup(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('Name'),
            $this->text('Type'),
            $this->text('Store')
        );

        $rows = array();

        foreach ($items as $item) {
            $rows[] = array(
                $item['category_group_id'],
                $item['title'],
                $item['type'],
                $item['store_id']
            );
        }

        $this->outputFormatTable($rows, $header);
    }

    /**
     * Add a new category group
     */
    protected function addCategoryGroup()
    {
        if (!$this->isError()) {
            $id = $this->category_group->add($this->getSubmitted());
            if (empty($id)) {
                $this->errorAndExit($this->text('Unexpected result'));
            }
            $this->line($id);
        }
    }

    /**
     * Updates a category group
     * @param string $category_group_id
     */
    protected function updateCategoryGroup($category_group_id)
    {
        if (!$this->isError() && !$this->category_group->update($category_group_id, $this->getSubmitted())) {
            $this->errorAndExit($this->text('Unexpected result'));
        }
    }

    /**
     * Add a new category group at once
     */
    protected function submitAddCategoryGroup()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->validateComponent('category_group');
        $this->addCategoryGroup();
    }

    /**
     * Add a new category group step by step
     */
    protected function wizardAddCategoryGroup()
    {
        $this->validatePrompt('title', $this->text('Name'), 'category_group');
        $this->validatePrompt('store_id', $this->text('Store ID'), 'category_group');
        $this->validateMenu('type', $this->text('Type'), 'category_group', $this->category_group->getTypes());

        $this->validateComponent('category_group');
        $this->addCategoryGroup();
    }

}
