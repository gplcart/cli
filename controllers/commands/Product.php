<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers\commands;

use gplcart\core\models\Currency as CurrencyModel;
use gplcart\core\models\Product as ProductModel;
use gplcart\modules\cli\controllers\Command;

/**
 * Handles commands related to products
 */
class Product extends Command
{

    /**
     * Product model instance
     * @var \gplcart\core\models\Product $product
     */
    protected $product;

    /**
     * Currency model instance
     * @var \gplcart\core\models\Currency $currency
     */
    protected $currency;

    /**
     * @param ProductModel $product
     * @param CurrencyModel $currency
     */
    public function __construct(ProductModel $product, CurrencyModel $currency)
    {
        parent::__construct();

        $this->product = $product;
        $this->currency = $currency;
    }

    /**
     * Callback for "product-get" command
     */
    public function cmdGetProduct()
    {
        $result = $this->getListProduct();
        $this->outputFormat($result);
        $this->outputFormatTableProduct($result);
        $this->output();
    }

    /**
     * Callback for "product-delete" command
     */
    public function cmdDeleteProduct()
    {
        $id = $this->getParam(0);
        $all = $this->getParam('all');

        if (!isset($id) && empty($all)) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        if (isset($id) && !is_numeric($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        $options = null;

        if (isset($id)) {

            if ($this->getParam('user')) {
                $options = array('user_id' => $id);
            } else if ($this->getParam('store')) {
                $options = array('store_id' => $id);
            } else if ($this->getParam('category')) {
                $options = array('category_id' => $id);
            } else if ($this->getParam('class')) {
                $options = array('product_class_id' => $id);
            } else if ($this->getParam('brand')) {
                $options = array('brand_category_id' => $id);
            }

        } else if ($all) {
            $options = array();
        }

        if (isset($options)) {

            $deleted = $count = 0;
            foreach ($this->product->getList($options) as $item) {
                $count++;
                $deleted += (int) $this->product->delete($item['product_id']);
            }

            $result = $count && $count == $deleted;

        } else if (!empty($id)) {
            $result = $this->product->delete($id);
        }

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->output();
    }

    /**
     * Callback for "product-add" command
     */
    public function cmdAddProduct()
    {
        if ($this->getParam()) {
            $this->submitAddProduct();
        } else {
            $this->wizardAddProduct();
        }

        $this->output();
    }

    /**
     * Callback for "product-update" command
     */
    public function cmdUpdateProduct()
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
        $this->setSubmitted('form', true); // Internal flag. Specifies that the product submitted manually

        $this->validateComponent('product');
        $this->updateProduct($params[0]);
        $this->output();
    }

    /**
     * Returns an array of products
     * @return array
     */
    protected function getListProduct()
    {
        $id = $this->getParam(0);

        if (!isset($id)) {
            return $this->product->getList(array('limit' => $this->getLimit()));
        }

        if (!is_numeric($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        if ($this->getParam('user')) {
            return $this->product->getList(array('user_id' => $id, 'limit' => $this->getLimit()));
        }

        if ($this->getParam('category')) {
            return $this->product->getList(array('category_id' => $id, 'limit' => $this->getLimit()));
        }

        if ($this->getParam('brand')) {
            return $this->product->getList(array('brand_category_id' => $id, 'limit' => $this->getLimit()));
        }

        if ($this->getParam('class')) {
            return $this->product->getList(array('product_class_id' => $id, 'limit' => $this->getLimit()));
        }

        if ($this->getParam('store')) {
            return $this->product->getList(array('store_id' => $id, 'limit' => $this->getLimit()));
        }

        $result = $this->product->get($id);

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        return array($result);
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableProduct(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('Title'),
            $this->text('Category'),
            $this->text('Brand'),
            $this->text('Product class'),
            $this->text('Price'),
            $this->text('Currency'),
            $this->text('Store'),
            $this->text('User'),
            $this->text('Enabled')
        );

        $rows = array();

        foreach ($items as $item) {
            $rows[] = array(
                $item['product_id'],
                $this->truncate($item['title'], 50),
                $item['category_id'],
                $item['brand_category_id'],
                $item['product_class_id'],
                $item['price'],
                $item['currency'],
                $item['store_id'],
                $item['user_id'],
                empty($item['status']) ? $this->text('No') : $this->text('Yes')
            );
        }

        $this->outputFormatTable($rows, $header);
    }

    /**
     * Add a new product
     */
    protected function addProduct()
    {
        if (!$this->isError()) {
            $id = $this->product->add($this->getSubmitted());
            if (empty($id)) {
                $this->errorAndExit($this->text('Unexpected result'));
            }
            $this->line($id);
        }
    }

    /**
     * Updates a product
     * @param string $product_id
     */
    protected function updateProduct($product_id)
    {
        if (!$this->isError() && !$this->product->update($product_id, $this->getSubmitted())) {
            $this->errorAndExit($this->text('Unexpected result'));
        }
    }

    /**
     * Add a new product at once
     */
    protected function submitAddProduct()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->setSubmitted('form', true); // Internal flag. Specifies that the product submitted manually
        $this->validateComponent('product');
        $this->addProduct();
    }

    /**
     * Add a new product step by step
     */
    protected function wizardAddProduct()
    {
        // Required
        $this->validatePrompt('title', $this->text('Title'), 'product');

        // Optional
        $this->validatePrompt('description', $this->text('Description'), 'product');
        $this->validatePrompt('store_id', $this->text('Store ID'), 'product', 0);
        $this->validatePrompt('sku', $this->text('SKU'), 'product', '');
        $this->validatePrompt('stock', $this->text('Stock'), 'product', 0);
        $this->validatePrompt('price', $this->text('Price'), 'product', 0);
        $this->validatePrompt('currency', $this->text('Currency code'), 'product', $this->currency->getDefault());
        $this->validatePrompt('product_class_id', $this->text('Product class ID'), 'product', 0);
        $this->validatePrompt('user_id', $this->text('User ID'), 'product', 0);
        $this->validatePrompt('meta_title', $this->text('Meta title'), 'product', '');
        $this->validatePrompt('meta_description', $this->text('Meta description'), 'product', '');
        $this->validatePrompt('category_id', $this->text('Category ID'), 'product', 0);
        $this->validatePrompt('brand_category_id', $this->text('Brand category ID'), 'product', 0);

        $size_units = $this->product->getSizeUnits();
        $this->validateMenu('size_unit', $this->text('Size unit'), 'product', $size_units, key($size_units));

        $this->validatePrompt('length', $this->text('Length'), 'product', 0);
        $this->validatePrompt('width', $this->text('Width'), 'product', 0);
        $this->validatePrompt('height', $this->text('Height'), 'product', 0);

        $weight_units = $this->product->getWeightUnits();
        $this->validateMenu('weight_unit', $this->text('Weight unit'), 'product', $weight_units, key($weight_units));
        $this->validatePrompt('weight', $this->text('Weight'), 'product', 0);

        $this->validatePrompt('subtract', $this->text('Subtract'), 'page', 0);
        $this->validatePrompt('status', $this->text('Status'), 'page', 0);

        $this->setSubmitted('form', true); // Internal flag. Specifies that the product submitted manually
        $this->validateComponent('product');
        $this->addProduct();
    }

}
