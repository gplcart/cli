<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers\commands;

use gplcart\core\models\ProductClass as ProductClassModel;
use gplcart\modules\cli\controllers\Command;

/**
 * Handles commands related to product classes
 */
class ProductClass extends Command
{

    /**
     * Product class model instance
     * @var \gplcart\core\models\ProductClass $product_class
     */
    protected $product_class;

    /**
     * @param ProductClassModel $product_class
     */
    public function __construct(ProductClassModel $product_class)
    {
        parent::__construct();

        $this->product_class = $product_class;
    }

    /**
     * Callback for "product-class-get" command
     */
    public function cmdGetProductClass()
    {
        $result = $this->getListProductClass();
        $this->outputFormat($result);
        $this->outputFormatTableProductClass($result);
        $this->output();
    }

    /**
     * Callback for "product-class-delete" command
     */
    public function cmdDeleteProductClass()
    {
        $id = $this->getParam(0);

        $result = null;

        if (isset($id)) {

            if (empty($id) || !is_numeric($id)) {
                $this->errorAndExit($this->text('Invalid argument'));
            }

            $result = $this->product_class->delete($id);

        } else if ($this->getParam('all')) {

            $deleted = $count = 0;
            foreach ($this->product_class->getList() as $item) {
                $count++;
                $deleted += (int) $this->product_class->delete($item['product_class_id']);
            }

            $result = $count && $count == $deleted;

        } else {
            $this->errorAndExit($this->text('Invalid command'));
        }

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->output();
    }

    /**
     * Callback for "product-class-add" command
     */
    public function cmdAddProductClass()
    {
        if ($this->getParam()) {
            $this->submitAddProductClass();
        } else {
            $this->wizardAddProductClass();
        }

        $this->output();
    }

    /**
     * Callback for "product-class-update" command
     */
    public function cmdUpdateProductClass()
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
        $this->validateComponent('product_class');

        $this->updateProductClass($params[0]);
        $this->output();
    }

    /**
     * Returns an array of product classes
     * @return array
     */
    protected function getListProductClass()
    {
        $id = $this->getParam(0);

        if (!isset($id)) {
            return $this->product_class->getList(array('limit' => $this->getLimit()));
        }

        if (!is_numeric($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        $result = $this->product_class->get($id);

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        return array($result);
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableProductClass(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('Title'),
            $this->text('Enabled')
        );

        $rows = array();

        foreach ($items as $item) {
            $rows[] = array(
                $item['product_class_id'],
                $item['title'],
                empty($item['status']) ? $this->text('No') : $this->text('Yes')
            );
        }

        $this->outputFormatTable($rows, $header);
    }

    /**
     * Add a new product class
     */
    protected function addProductClass()
    {
        if (!$this->isError()) {
            $id = $this->product_class->add($this->getSubmitted());
            if (empty($id)) {
                $this->errorAndExit($this->text('Unexpected result'));
            }
            $this->line($id);
        }
    }

    /**
     * Updates a product class
     * @param string $product_class_id
     */
    protected function updateProductClass($product_class_id)
    {
        if (!$this->isError() && !$this->product_class->update($product_class_id, $this->getSubmitted())) {
            $this->errorAndExit($this->text('Unexpected result'));
        }
    }

    /**
     * Add a new product class at once
     */
    protected function submitAddProductClass()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->validateComponent('product_class');
        $this->addProductClass();
    }

    /**
     * Add a new product class step by step
     */
    protected function wizardAddProductClass()
    {
        $this->validatePrompt('title', $this->text('Title'), 'product_class');
        $this->validatePrompt('status', $this->text('Status'), 'product_class', 0);
        $this->validateComponent('product_class');
        $this->addProductClass();
    }

}
