<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use gplcart\core\models\Page as PageModel;

/**
 * Handles commands related to pages
 */
class Page extends Base
{

    /**
     * Page model instance
     * @var \gplcart\core\models\Page $page
     */
    protected $page;

    /**
     * @param PageModel $page
     */
    public function __construct(PageModel $page)
    {
        parent::__construct();

        $this->page = $page;
    }

    /**
     * Callback for "page-get" command
     */
    public function cmdGetPage()
    {
        $result = $this->getListPage();
        $this->outputFormat($result);
        $this->outputFormatTablePage($result);
        $this->output();
    }

    /**
     * Callback for "page-delete" command
     */
    public function cmdDeletePage()
    {
        $id = $this->getParam(0);
        $all = $this->getParam('all');
        $blog = $this->getParam('blog');

        if (empty($id) && empty($all) && empty($blog)) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        if (isset($id) && (empty($id) || !is_numeric($id))) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        $options = null;

        if (isset($id)) {

            if ($this->getParam('store')) {
                $options = array('store_id' => $id);
            } else if ($this->getParam('category')) {
                $options = array('category_id' => $id);
            } else if ($this->getParam('user')) {
                $options = array('user_id' => $id);
            }

        } else if ($blog) {
            $options = array('blog_post' => true);
        } else if ($all) {
            $options = array();
        }

        if (isset($options)) {

            $deleted = $count = 0;
            foreach ($this->page->getList($options) as $item) {
                $count++;
                $deleted += (int) $this->page->delete($item['page_id']);
            }

            $result = $count && $count == $deleted;

        } else {
            $result = $this->page->delete($id);
        }

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->output();
    }

    /**
     * Callback for "page-add" command
     */
    public function cmdAddPage()
    {
        if ($this->getParam()) {
            $this->submitAddPage();
        } else {
            $this->wizardAddPage();
        }

        $this->output();
    }

    /**
     * Callback for "page-update" command
     */
    public function cmdUpdatePage()
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
        $this->validateComponent('page');

        $this->updatePage($params[0]);
        $this->output();
    }

    /**
     * Returns an array of pages
     * @return array
     */
    protected function getListPage()
    {
        $id = $this->getParam(0);

        if (!isset($id)) {
            return $this->page->getList(array('limit' => $this->getLimit()));
        }

        if ($this->getParam('user')) {
            return $this->page->getList(array('user_id' => $id, 'limit' => $this->getLimit()));
        }

        if ($this->getParam('category')) {
            return $this->page->getList(array('category_id' => $id, 'limit' => $this->getLimit()));
        }

        if ($this->getParam('store')) {
            return $this->page->getList(array('store_id' => $id, 'limit' => $this->getLimit()));
        }

        if (!is_numeric($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        $result = $this->page->get($id);

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        return array($result);
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTablePage(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('Title'),
            $this->text('Category'),
            $this->text('Store'),
            $this->text('User'),
            $this->text('Enabled')
        );

        $rows = array();

        foreach ($items as $item) {
            $rows[] = array(
                $item['page_id'],
                $item['title'],
                $item['category_id'],
                $item['store_id'],
                $item['user_id'],
                empty($item['status']) ? $this->text('No') : $this->text('Yes')
            );
        }

        $this->outputFormatTable($rows, $header);
    }

    /**
     * Add a new page
     */
    protected function addPage()
    {
        if (!$this->isError()) {
            $id = $this->page->add($this->getSubmitted());
            if (empty($id)) {
                $this->errorAndExit($this->text('Unexpected result'));
            }
            $this->line($id);
        }
    }

    /**
     * Updates a page
     * @param string $page_id
     */
    protected function updatePage($page_id)
    {
        if (!$this->isError() && !$this->page->update($page_id, $this->getSubmitted())) {
            $this->errorAndExit($this->text('Unexpected result'));
        }
    }

    /**
     * Add a new page at once
     */
    protected function submitAddPage()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->validateComponent('page');
        $this->addPage();
    }

    /**
     * Add a new page step by step
     */
    protected function wizardAddPage()
    {
        // Required
        $this->validatePrompt('title', $this->text('Title'), 'page');
        $this->validatePrompt('description', $this->text('Description'), 'page');
        $this->validatePrompt('store_id', $this->text('Store ID'), 'page');

        // Optional
        $this->validatePrompt('user_id', $this->text('User ID'), 'page', 0);
        $this->validatePrompt('meta_title', $this->text('Meta title'), 'page', '');
        $this->validatePrompt('meta_description', $this->text('Meta description'), 'page', '');
        $this->validatePrompt('category_id', $this->text('Category ID'), 'page', 0);
        $this->validatePrompt('blog_post', $this->text('Blog post'), 'page', 0);
        $this->validatePrompt('status', $this->text('Status'), 'page', 0);

        $this->validateComponent('page');
        $this->addPage();
    }

}
