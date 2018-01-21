<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use gplcart\core\models\Cart as CartModel;

/**
 * Handles commands related to cart functionality
 */
class Cart extends Base
{

    /**
     * Cart model instance
     * @var \gplcart\core\models\Cart $cart
     */
    protected $cart;

    /**
     * @param CartModel $rule
     */
    public function __construct(CartModel $rule)
    {
        parent::__construct();

        $this->cart = $rule;
    }

    /**
     * Callback for "cart-get" command
     */
    public function cmdGetCart()
    {
        $result = $this->getListCart();
        $this->outputFormat($result);
        $this->outputFormatTableCart($result);
        $this->output();
    }

    /**
     * Callback for "cart-delete" command
     */
    public function cmdDeleteCart()
    {
        $id = $this->getParam(0);

        $options = null;

        if ($this->getParam('user')) {
            $options = array('user_id' => $id);
        } else if ($this->getParam('sku')) {
            $options = array('sku' => $id);
        } else if ($this->getParam('order')) {

            if (!is_numeric($id)) {
                $this->errorAndExit($this->text('Invalid ID'));
            }

            $options = array('order_id' => $id);
        }

        if (isset($options)) {

            $deleted = $count = 0;
            foreach ($this->cart->getList($options) as $item) {
                $count++;
                $deleted += (int) $this->cart->delete($item['cart_id']);
            }

            $result = $count && $count == $deleted;

        } else {

            if (empty($id) || !is_numeric($id)) {
                $this->errorAndExit($this->text('Invalid ID'));
            }

            $result = $this->cart->delete($id);
        }

        if (!$result) {
            $this->errorAndExit($this->text('An error occurred'));
        }

        $this->output();
    }

    /**
     * Callback for "cart-add" command
     */
    public function cmdAddCart()
    {
        if ($this->getParam()) {
            $this->submitAddCart();
        } else {
            $this->wizardAddCart();
        }

        $this->output();
    }

    /**
     * Returns an array of cart items
     * @return array
     */
    protected function getListCart()
    {
        $id = $this->getParam(0);

        if (!isset($id)) {
            return $this->cart->getList(array('limit' => $this->getLimit()));
        }

        if ($this->getParam('user')) {
            return $this->cart->getList(array('user_id' => $id, 'limit' => $this->getLimit()));
        }

        if ($this->getParam('sku')) {
            return $this->cart->getList(array('sku' => $id, 'limit' => $this->getLimit()));
        }

        if (!is_numeric($id)) {
            $this->errorAndExit($this->text('Invalid ID'));
        }

        if ($this->getParam('order')) {
            return $this->cart->getList(array('order_id' => $id, 'limit' => $this->getLimit()));
        }

        if ($this->getParam('store')) {
            return $this->cart->getList(array('store_id' => $id, 'limit' => $this->getLimit()));
        }

        $result = $this->cart->get($id);

        if (empty($result)) {
            $this->errorAndExit($this->text('Invalid ID'));
        }

        return array($result);
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableCart(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('User ID'),
            $this->text('Store ID'),
            $this->text('SKU'),
            $this->text('Order ID'),
            $this->text('Quantity'),
            $this->text('Created')
        );

        $rows = array();

        foreach ($items as $item) {
            $rows[] = array(
                $item['cart_id'],
                $item['user_id'],
                $item['store_id'],
                $item['sku'],
                $item['order_id'],
                $item['quantity'],
                $this->date($item['created'])
            );
        }

        $this->outputFormatTable($rows, $header);
    }

    /**
     * Add a new cart item at once
     */
    protected function submitAddCart()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->setSubmittedJson('data');
        $this->validateComponent('cart');
        $this->addAddCart();
    }

    /**
     * Add a new cart item step by step
     */
    protected function wizardAddCart()
    {
        // Required
        $this->validatePrompt('user_id', $this->text('User ID'), 'cart');
        $this->validatePrompt('product_id', $this->text('Product ID'), 'cart');
        $this->validatePrompt('sku', $this->text('Product SKU'), 'cart');
        $this->validatePrompt('store_id', $this->text('Store ID'), 'cart');

        // Optional
        $this->validatePrompt('quantity', $this->text('Quantity'), 'cart', 1);
        $this->validatePrompt('order_id', $this->text('Order ID'), 'cart', 0);
        $this->validatePrompt('data', $this->text('Data'), 'cart');

        $this->setSubmittedJson('data');
        $this->validateComponent('cart');
        $this->addAddCart();
    }

    /**
     * Add a new cart item
     */
    protected function addAddCart()
    {
        if (!$this->isError()) {
            $id = $this->cart->add($this->getSubmitted());
            if (empty($id)) {
                $this->errorAndExit($this->text('An error occurred'));
            }
            $this->line($id);
        }
    }

}
