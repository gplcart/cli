<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers\commands;

use gplcart\core\models\ProductClassField as ProductClassFieldModel;
use gplcart\modules\cli\controllers\Command;

/**
 * Handles commands related to product class fields
 */
class ProductClassField extends Command
{

    /**
     * Product class field model instance
     * @var \gplcart\core\models\ProductClassField $product_class_field
     */
    protected $product_class_field;

    /**
     * @param ProductClassFieldModel $product_class_field
     */
    public function __construct(ProductClassFieldModel $product_class_field)
    {
        parent::__construct();

        $this->product_class_field = $product_class_field;
    }

    /**
     * Callback for "product-class-field-get" command
     */
    public function cmdGetProductClassField()
    {
        $result = $this->getListProductClassField();
        $this->outputFormat($result);
        $this->outputFormatTableProductClassField($result);
        $this->output();
    }

    /**
     * Callback for "product-class-field-delete" command
     */
    public function cmdDeleteProductClassField()
    {
        $id = $this->getParam(0);
        $all = $this->getParam('all');

        if (!isset($id) && empty($all)) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        if (isset($id) && (empty($id) || !is_numeric($id))) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        $options = null;

        if (isset($id)) {

            if ($this->getParam('class')) {
                $options = array('product_class_id' => $id);
            } else if ($this->getParam('field')) {
                $options = array('field_id' => $id);
            }

        } else if (!empty($all)) {
            $options = array();
        }

        if (isset($options)) {

            $deleted = $count = 0;
            foreach ($this->product_class_field->getList($options) as $item) {
                $count++;
                $deleted += (int) $this->product_class_field->delete($item['product_class_field_id']);
            }

            $result = $count && $count == $deleted;

        } else if (!empty($id)) {
            $result = $this->product_class_field->delete($id);
        }

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->output();
    }

    /**
     * Callback for "product-class-field-add" command
     */
    public function cmdAddProductClassField()
    {
        if ($this->getParam()) {
            $this->submitAddProductClassField();
        } else {
            $this->wizardAddProductClassField();
        }

        $this->output();
    }

    /**
     * Callback for "product-class-field-update" command
     */
    public function cmdUpdateProductClassField()
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

        $this->validateComponent('product_class_field');
        $this->updateProductClassField($params[0]);
        $this->output();
    }

    /**
     * Returns an array of product class fields
     * @return array
     */
    protected function getListProductClassField()
    {
        $id = $this->getParam(0);

        if (!isset($id)) {
            return $this->product_class_field->getList(array('limit' => $this->getLimit()));
        }

        if ($this->getParam('class')) {
            return $this->product_class_field->getList(array('product_class_id' => $id, 'limit' => $this->getLimit()));
        }

        if ($this->getParam('field')) {
            return $this->product_class_field->getList(array('field_id' => $id, 'limit' => $this->getLimit()));
        }

        if (!is_numeric($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        $result = $this->product_class_field->get($id);

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        return array($result);
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableProductClassField(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('Product class'),
            $this->text('Field'),
            $this->text('Required'),
            $this->text('Multiple'),
            $this->text('Weight')
        );

        $rows = array();

        foreach ($items as $item) {
            $rows[] = array(
                $item['product_class_field_id'],
                $item['product_class_id'],
                $item['field_id'],
                $item['required'],
                $item['multiple'],
                $item['weight']
            );
        }

        $this->outputFormatTable($rows, $header);
    }

    /**
     * Add a new product class field
     */
    protected function addProductClassField()
    {
        if (!$this->isError()) {
            $id = $this->product_class_field->add($this->getSubmitted());
            if (empty($id)) {
                $this->errorAndExit($this->text('Unexpected result'));
            }
            $this->line($id);
        }
    }

    /**
     * Updates a product class field
     * @param string $product_class_field_id
     */
    protected function updateProductClassField($product_class_field_id)
    {
        if (!$this->isError() && !$this->product_class_field->update($product_class_field_id, $this->getSubmitted())) {
            $this->errorAndExit($this->text('Unexpected result'));
        }
    }

    /**
     * Add a new product class field at once
     */
    protected function submitAddProductClassField()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->validateComponent('product_class_field');
        $this->addProductClassField();
    }

    /**
     * Add a new product class field step by step
     */
    protected function wizardAddProductClassField()
    {
        // Required
        $this->validatePrompt('product_class_id', $this->text('Product class'), 'product_class_field');
        $this->validatePrompt('field_id', $this->text('Field ID'), 'product_class_field');

        // Optional
        $this->validatePrompt('required', $this->text('Required'), 'product_class_field', 0);
        $this->validatePrompt('multiple', $this->text('Multiple'), 'product_class_field', 0);

        $this->validateComponent('product_class_field');
        $this->addProductClassField();
    }

}
