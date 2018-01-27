<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers\commands;

use gplcart\core\models\Category as CategoryModel;
use gplcart\modules\cli\controllers\Command;

/**
 * Handles commands related to categories
 */
class Category extends Command
{

    /**
     * Category model instance
     * @var \gplcart\core\models\Category $category
     */
    protected $category;

    /**
     * @param CategoryModel $category
     */
    public function __construct(CategoryModel $category)
    {
        parent::__construct();

        $this->category = $category;
    }

    /**
     * Callback for "category-get" command
     */
    public function cmdGetCategory()
    {
        $result = $this->getListCategory();
        $this->outputFormat($result);
        $this->outputFormatTableCategory($result);
        $this->output();
    }

    /**
     * Callback for "category-delete" command
     */
    public function cmdDeleteCategory()
    {
        $id = $this->getParam(0);
        $all = $this->getParam('all');

        if (empty($id) && empty($all)) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        if (empty($all) && (empty($id) || !is_numeric($id))) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        $options = null;

        if ($this->getParam('group')) {
            $options = array('category_group_id' => $id);
        } else if ($this->getParam('store')) {
            $options = array('store_id' => $id);
        } else if (!empty($all)) {
            $options = array();
        }

        if (isset($options)) {

            $deleted = $count = 0;
            foreach ($this->category->getList($options) as $item) {
                $count++;
                $deleted += (int) $this->category->delete($item['category_id']);
            }

            $result = $count && $count == $deleted;

        } else {

            $result = $this->category->delete($id);
        }

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->output();
    }

    /**
     * Callback for "category-add" command
     */
    public function cmdAddCategory()
    {
        if ($this->getParam()) {
            $this->submitAddCategory();
        } else {
            $this->wizardAddCategory();
        }

        $this->output();
    }

    /**
     * Callback for "category-update" command
     */
    public function cmdUpdateCategory()
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
        $this->validateComponent('category');

        $this->updateCategory($params[0]);
        $this->output();
    }

    /**
     * Returns an array of categories
     * @return array
     */
    protected function getListCategory()
    {
        $id = $this->getParam(0);

        if (!isset($id)) {
            return $this->category->getList(array('limit' => $this->getLimit()));
        }

        if (!is_numeric($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        if ($this->getParam('group')) {
            return $this->category->getList(array('category_group_id' => $id, 'limit' => $this->getLimit()));
        }

        if ($this->getParam('parent')) {
            return $this->category->getList(array('parent_id' => $id, 'limit' => $this->getLimit()));
        }

        $result = $this->category->get($id);

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        return array($result);
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableCategory(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('Title'),
            $this->text('Parent category'),
            $this->text('Alias'),
            $this->text('Weight'),
            $this->text('Enabled')
        );

        $rows = array();

        foreach ($items as $item) {
            $rows[] = array(
                $item['category_id'],
                $item['title'],
                $item['parent_id'],
                $item['alias'],
                $item['weight'],
                empty($item['status']) ? $this->text('No') : $this->text('Yes')
            );
        }

        $this->outputFormatTable($rows, $header);
    }

    /**
     * Add a new category
     */
    protected function addCategory()
    {
        if (!$this->isError()) {
            $id = $this->category->add($this->getSubmitted());
            if (empty($id)) {
                $this->errorAndExit($this->text('Unexpected result'));
            }
            $this->line($id);
        }
    }

    /**
     * Updates a category
     * @param string $category_id
     */
    protected function updateCategory($category_id)
    {
        if (!$this->isError() && !$this->category->update($category_id, $this->getSubmitted())) {
            $this->errorAndExit($this->text('Unexpected result'));
        }
    }

    /**
     * Add a new category at once
     */
    protected function submitAddCategory()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->validateComponent('category');
        $this->addCategory();
    }

    /**
     * Add a new category step by step
     */
    protected function wizardAddCategory()
    {
        // Required
        $this->validatePrompt('title', $this->text('Title'), 'category');
        $this->validatePrompt('category_group_id', $this->text('Category group ID'), 'category');

        // Optional
        $this->validatePrompt('parent_id', $this->text('Parent category ID'), 'category', 0);
        $this->validatePrompt('description_1', $this->text('First description'), 'category', '');
        $this->validatePrompt('description_2', $this->text('Second description'), 'category', '');
        $this->validatePrompt('meta_title', $this->text('Meta title'), 'category', '');
        $this->validatePrompt('meta_description', $this->text('Meta description'), 'category', '');
        $this->validatePrompt('status', $this->text('Status'), 'category', 0);
        $this->validatePrompt('weight', $this->text('Weight'), 'category', 0);

        $this->validateComponent('category');
        $this->addCategory();
    }

}
