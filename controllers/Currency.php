<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use gplcart\core\models\Currency as CurrencyModel;
use gplcart\modules\cli\controllers\Base;

/**
 * Handles commands related to currencies
 */
class Currency extends Base
{

    /**
     * Currency model class instance
     * @var \gplcart\core\models\Currency $currency
     */
    protected $currency;

    /**
     * @param CurrencyModel $currency
     */
    public function __construct(CurrencyModel $currency)
    {
        parent::__construct();

        $this->currency = $currency;
    }

    /**
     * Callback for "currency-update"
     */
    public function cmdUpdateCurrency()
    {
        $this->submitUpdateCurrency();
        $this->output();
    }

    /**
     * Callback for "currency-add"
     */
    public function cmdAddCurrency()
    {
        if ($this->getParam()) {
            $this->submitAddCurrency();
        } else {
            $this->wizardAddCurrency();
        }

        $this->output();
    }

    /**
     * Callback for "currency-get" command
     */
    public function cmdGetCurrency()
    {
        $list = $this->getListCurrency();
        $this->outputFormat($list);
        $this->outputFormatTableCurrency($list);
        $this->output();
    }

    /**
     * Callback for "currency-delete" command
     */
    public function cmdDeleteCurrency()
    {
        $id = $this->getParam(0);
        $all = $this->getParam('all');

        if (empty($id) && empty($all)) {
            $this->errorExit($this->text('Invalid command'));
        }

        $result = false;

        if (!empty($id)) {
            $result = $this->currency->delete($id);
        } else if (!empty($all)) {
            $deleted = $count = 0;
            foreach ($this->currency->getList(array('in_database' => true)) as $currency) {
                $count++;
                $deleted += (int) $this->currency->delete($currency['code']);
            }
            $result = ($count == $deleted);
        }

        if (!$result) {
            $this->errorExit($this->text('An error occurred'));
        }

        $this->output();
    }

    /**
     * Returns an array of currencies
     * @return array
     */
    protected function getListCurrency()
    {
        $id = $this->getParam(0);

        if (isset($id)) {
            $result = $this->currency->get($id);
            if (empty($result)) {
                $this->errorExit($this->text('Invalid ID'));
            }
            return array($result);
        }

        $list = $this->currency->getList();
        $this->limitItems($list);
        return $list;
    }

    /**
     * Output formatted table
     * @param array $items
     */
    protected function outputFormatTableCurrency(array $items)
    {
        $header = array(
            $this->text('Code'),
            $this->text('Name'),
            $this->text('Symbol'),
            $this->text('Conversion rate'),
            $this->text('In database'),
            $this->text('Enabled')
        );

        $rows = array();
        foreach ($items as $item) {
            $rows[] = array(
                $item['code'],
                $this->text($item['name']),
                $item['symbol'],
                $item['conversion_rate'],
                empty($item['in_database']) ? $this->text('No') : $this->text('Yes'),
                empty($item['status']) ? $this->text('No') : $this->text('Yes'),
            );
        }

        $this->outputFormatTable($rows, $header);
    }

    /**
     * Adds a currency
     */
    protected function addCurrency()
    {
        if (!$this->isError() && !$this->currency->add($this->getSubmitted())) {
            $this->errorExit($this->text('Currency has not been added'));
        }
    }

    /**
     * Updates a currency
     * @param string $code
     */
    protected function updateCurrency($code)
    {
        if (!$this->isError() && !$this->currency->update($code, $this->getSubmitted())) {
            $this->errorExit($this->text('Currency has not been updated'));
        }
    }

    /**
     * Add a currency at once
     */
    protected function submitAddCurrency()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->validateComponent('currency');
        $this->addCurrency();
    }

    /**
     * Updates a currency
     */
    protected function submitUpdateCurrency()
    {
        $params = $this->getParam();
        if (empty($params[0]) || count($params) < 2) {
            $this->errorExit($this->text('Invalid command'));
        }

        $this->setSubmitted(null, $params);
        $this->setSubmitted('update', $params[0]);

        $this->validateComponent('currency');
        $this->updateCurrency($params[0]);
    }

    /**
     * Adds a currency step by step
     */
    protected function wizardAddCurrency()
    {
        // Required
        $this->validateInput('code', $this->text('Code'), 'currency');
        $this->validateInput('name', $this->text('Name'), 'currency');
        $this->validateInput('symbol', $this->text('Symbol'), 'currency');
        $this->validateInput('major_unit', $this->text('Major unit'), 'currency');
        $this->validateInput('minor_unit', $this->text('Minor unit'), 'currency');
        $this->validateInput('numeric_code', $this->text('Numeric code'), 'currency');

        // Optional
        $this->validateInput('status', $this->text('Status'), 'currency', 0);
        $this->validateInput('default', $this->text('Default'), 'currency', 0);
        $this->validateInput('decimals', $this->text('Decimals'), 'currency', 2);
        $this->validateInput('rounding_step', $this->text('Rounding step'), 'currency', 0);
        $this->validateInput('conversion_rate', $this->text('Conversion rate'), 'currency', 1);
        $this->validateInput('decimal_separator', $this->text('Decimal separator'), 'currency', '.');
        $this->validateInput('thousands_separator', $this->text('Thousands separator'), 'currency', ',');
        $this->validateInput('template', $this->text('Template'), 'currency', '%symbol%price');

        $this->validateComponent('currency');
        $this->addCurrency();
    }

}
