<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers\commands;

use gplcart\core\models\Shipping as ShippingModel;
use gplcart\modules\cli\controllers\Command;

/**
 * Handles commands related to shipping methods
 */
class Shipping extends Command
{

    /**
     * Shipping model instance
     * @var \gplcart\core\models\Shipping $shipping
     */
    protected $shipping;

    /**
     * @param ShippingModel $shipping
     */
    public function __construct(ShippingModel $shipping)
    {
        parent::__construct();

        $this->shipping = $shipping;
    }

    /**
     * Callback for "shipping-get" command
     */
    public function cmdGetShipping()
    {
        $result = $this->getListShipping();
        $this->outputFormat($result);
        $this->outputFormatTableShipping($result);
        $this->output();
    }

    /**
     * Returns an array of shipping methods
     * @return array
     */
    protected function getListShipping()
    {
        $id = $this->getParam(0);

        if (!isset($id)) {
            $list = $this->shipping->getList();
            $this->limitArray($list);
            return $list;
        }

        $method = $this->shipping->get($id);

        if (empty($method)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        return array($method);
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableShipping(array $items)
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
