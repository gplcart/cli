<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers\commands;

use gplcart\core\models\Order as OrderModel;
use gplcart\modules\cli\controllers\Command;

/**
 * Handles commands related to store orders
 */
class Order extends Command
{

    /**
     * Order model instance
     * @var \gplcart\core\models\Order $order
     */
    protected $order;

    /**
     * @param OrderModel $order
     */
    public function __construct(OrderModel $order)
    {
        parent::__construct();

        $this->order = $order;
    }

    /**
     * Callback for "order-get" command
     */
    public function cmdGetOrder()
    {
        $result = $this->getListOrder();
        $this->outputFormat($result);
        $this->outputFormatTableOrder($result);
        $this->output();
    }

    /**
     * Callback for "order-delete" command
     */
    public function cmdDeleteOrder()
    {
        $id = $this->getParam(0);

        if (empty($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        $options = null;

        if ($this->getParam('status')) {
            $options = array('status' => $id);
        } else if ($this->getParam('store')) {

            if (!is_numeric($id)) {
                $this->errorAndExit($this->text('Invalid argument'));
            }

            $options = array('store_id' => $id);

        } else if ($this->getParam('user')) {
            $options = array('user_id' => $id);
        }

        if (isset($options)) {

            $deleted = $count = 0;

            foreach ($this->order->getList($options) as $item) {
                $count++;
                $deleted += (int) $this->order->delete($item['order_id']);
            }

            $result = $count && $count == $deleted;

        } else {

            if (!is_numeric($id)) {
                $this->errorAndExit($this->text('Invalid argument'));
            }

            $result = $this->order->delete($id);
        }

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->output();
    }

    /**
     * Callback for "order-add" command
     */
    public function cmdAddOrder()
    {
        $submitted = $this->getParam();

        $this->setSubmitted(null, $submitted);
        $this->setSubmittedJson('data');

        $this->validateComponent('order');

        if ($this->isError()) {
            $this->output();
        }

        $id = $this->order->add($this->getSubmitted());

        if (empty($id)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->line($id);
        $this->output();
    }

    /**
     * Callback for "order-update" command
     */
    public function cmdUpdateOrder()
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
        $this->setSubmittedJson('data');

        $this->validateComponent('order');

        if ($this->isError()) {
            $this->output();
        }

        if (!$this->order->update($params[0], $this->getSubmitted())) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->output();
    }

    /**
     * Returns an array of orders
     * @return array
     */
    protected function getListOrder()
    {
        $id = $this->getParam(0);
        $limit = $this->getLimit();

        if (!isset($id)) {
            return $this->order->getList(array('limit' => $limit));
        }

        if ($this->getParam('user')) {
            return $this->order->getList(array('user_id' => $id, 'limit' => $limit));
        }

        if ($this->getParam('status')) {
            return $this->order->getList(array('status' => $id, 'limit' => $limit));
        }

        if (!is_numeric($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        if ($this->getParam('store')) {
            return $this->order->getList(array('store_id' => $id, 'limit' => $limit));
        }

        if ($this->getParam('shipping-address')) {
            return $this->order->getList(array('shipping_address' => $id, 'limit' => $limit));
        }

        if ($this->getParam('payment-address')) {
            return $this->order->getList(array('payment_address' => $id, 'limit' => $limit));
        }

        $result = $this->order->get($id);

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        return array($result);
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableOrder(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('Store'),
            $this->text('Total'),
            $this->text('Currency'),
            $this->text('User'),
            $this->text('Payment'),
            $this->text('Shipping'),
            $this->text('Payment address'),
            $this->text('Shipping address'),
            $this->text('Status'),
            $this->text('Created')
        );

        $rows = array();

        foreach ($items as $item) {
            $rows[] = array(
                $item['order_id'],
                $item['store_id'],
                $item['total'],
                $item['currency'],
                $item['user_id'],
                $item['payment'],
                $item['shipping'],
                $item['payment_address'],
                $item['shipping_address'],
                $item['status'],
                $this->date($item['created'])
            );
        }

        $this->outputFormatTable($rows, $header);
    }

}
