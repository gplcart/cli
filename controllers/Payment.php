<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use gplcart\core\models\Payment as PaymentModel;

/**
 * Handles commands related to payment methods
 */
class Payment extends Base
{

    /**
     * Payment model instance
     * @var \gplcart\core\models\Payment $payment
     */
    protected $payment;

    /**
     * @param PaymentModel $payment
     */
    public function __construct(PaymentModel $payment)
    {
        parent::__construct();

        $this->payment = $payment;
    }

    /**
     * Callback for "payment-get" command
     */
    public function cmdGetPayment()
    {
        $result = $this->getListPayment();
        $this->outputFormat($result);
        $this->outputFormatTablePayment($result);
        $this->output();
    }

    /**
     * Returns an array of payment methods
     * @return array
     */
    protected function getListPayment()
    {
        $id = $this->getParam(0);

        if (!isset($id)) {
            $list = $this->payment->getList();
            $this->limitArray($list);
            return $list;
        }

        $method = $this->payment->get($id);

        if (empty($method)) {
            $this->errorExit($this->text('Invalid ID'));
        }

        return array($method);
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTablePayment(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('Name'),
            $this->text('Module'),
            $this->text('Enabled'),
        );

        $rows = array();

        foreach ($items as $item) {
            $rows[] = array(
                $item['id'],
                $this->truncate($item['title'], 50),
                $item['module'],
                empty($item['status']) ? $this->text('No') : $this->text('Yes')
            );
        }

        $this->outputFormatTable($rows, $header);
    }

}
