<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers\commands;

use gplcart\core\models\Currency as CurrencyModel;
use gplcart\core\models\PriceRule as PriceRuleModel;
use gplcart\modules\cli\controllers\Command;

/**
 * Handles commands related to price rules
 */
class PriceRule extends Command
{

    /**
     * Price rule model instance
     * @var \gplcart\core\models\PriceRule $price_rule
     */
    protected $price_rule;

    /**
     * Currency model class instance
     * @var \gplcart\core\models\Currency $currency
     */
    protected $currency;

    /**
     * @param PriceRuleModel $price_rule
     * @param CurrencyModel $currency
     */
    public function __construct(PriceRuleModel $price_rule, CurrencyModel $currency)
    {
        parent::__construct();

        $this->price_rule = $price_rule;
        $this->currency = $currency;
    }

    /**
     * Callback for "pricerule-on" command
     */
    public function cmdOnPriceRule()
    {
        $this->setStatusPriceRule(true);
        $this->output();
    }

    /**
     * Callback for "pricerule-off" command
     */
    public function cmdOffPriceRule()
    {
        $this->setStatusPriceRule(false);
        $this->output();
    }

    /**
     * Callback for "pricerule-get" command
     */
    public function cmdGetPriceRule()
    {
        $result = $this->getListPriceRule();
        $this->outputFormat($result);
        $this->outputFormatTablePriceRule($result);
        $this->output();
    }

    /**
     * Callback for "pricerule-delete" command
     */
    public function cmdDeletePriceRule()
    {
        $id = $this->getParam(0);
        $all = $this->getParam('all');

        if (!isset($id) && !$all) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        $result = $options = null;

        if (isset($id)) {

            if (empty($id) || !is_numeric($id)) {
                $this->errorAndExit($this->text('Invalid argument'));
            }

            if ($this->getParam('trigger')) {
                $options = array('trigger_id' => $id);
            } else {
                $result = $this->price_rule->delete($id);
            }

        } else if ($all) {
            $options = array();
        }

        if (isset($options)) {

            $deleted = $count = 0;
            foreach ($this->price_rule->getList($options) as $item) {
                $count++;
                $deleted += (int) $this->price_rule->delete($item['price_rule_id']);
            }

            $result = $count && $count == $deleted;
        }

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->output();
    }

    /**
     * Callback for "pricerule-add" command
     */
    public function cmdAddPriceRule()
    {
        if ($this->getParam()) {
            $this->submitAddPriceRule();
        } else {
            $this->wizardAddPriceRule();
        }

        $this->output();
    }

    /**
     * Callback for "pricerule-update" command
     */
    public function cmdUpdatePriceRule()
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
        $this->validateComponent('price_rule');

        $this->updatePriceRule($params[0]);
        $this->output();
    }

    /**
     * Returns an array of price rules
     * @return array
     */
    protected function getListPriceRule()
    {
        $id = $this->getParam(0);

        if (!isset($id)) {
            return $this->price_rule->getList(array('limit' => $this->getLimit()));
        }

        if (!is_numeric($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        if ($this->getParam('trigger')) {
            return $this->price_rule->getList(array('trigger_id' => $id, 'limit' => $this->getLimit()));
        }

        $result = $this->price_rule->get($id);

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        return array($result);
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTablePriceRule(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('Name'),
            $this->text('Trigger'),
            $this->text('Value'),
            $this->text('Value type'),
            $this->text('Currency'),
            $this->text('Code'),
            $this->text('Weight'),
            $this->text('Enabled')
        );

        $rows = array();

        foreach ($items as $item) {
            $rows[] = array(
                $item['price_rule_id'],
                $item['name'],
                $item['trigger_id'],
                $item['value'],
                $item['value_type'],
                $item['currency'],
                $item['code'],
                $item['weight'],
                empty($item['status']) ? $this->text('No') : $this->text('Yes')
            );
        }

        $this->outputFormatTable($rows, $header);
    }

    /**
     * Add a new price rule
     */
    protected function addPriceRule()
    {
        if (!$this->isError()) {
            $id = $this->price_rule->add($this->getSubmitted());
            if (empty($id)) {
                $this->errorAndExit($this->text('Unexpected result'));
            }
            $this->line($id);
        }
    }

    /**
     * Updates a price rule
     * @param string $price_rule_id
     */
    protected function updatePriceRule($price_rule_id)
    {
        if (!$this->isError() && !$this->price_rule->update($price_rule_id, $this->getSubmitted())) {
            $this->errorAndExit($this->text('Unexpected result'));
        }
    }

    /**
     * Add a new price rule at once
     */
    protected function submitAddPriceRule()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->validateComponent('price_rule');
        $this->addPriceRule();
    }

    /**
     * Add a new price rule step by step
     */
    protected function wizardAddPriceRule()
    {
        $this->validatePrompt('name', $this->text('Name'), 'price_rule');
        $this->validatePrompt('trigger_id', $this->text('Trigger ID'), 'price_rule');

        $types = array();
        foreach ($this->price_rule->getTypes() as $id => $type) {
            $types[$id] = $type['title'];
        }

        $this->validateMenu('value_type', $this->text('Value type'), 'price_rule', $types, 'percent');
        $this->validatePrompt('value', $this->text('Value'), 'price_rule');
        $this->validatePrompt('currency', $this->text('Currency'), 'price_rule', $this->currency->getDefault());
        $this->validatePrompt('code', $this->text('Code'), 'price_rule', '');
        $this->validatePrompt('status', $this->text('Status'), 'price_rule', 0);
        $this->validatePrompt('weight', $this->text('Weight'), 'price_rule', 0);

        $this->validateComponent('price_rule');
        $this->addPriceRule();
    }

    /**
     * Sets status for one or several price rules
     * @param bool $status
     */
    protected function setStatusPriceRule($status)
    {
        $id = $this->getParam(0);
        $all = $this->getParam('all');

        if (!isset($id) && !$all) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        $result = $options = null;

        if (isset($id)) {

            if (empty($id) || !is_numeric($id)) {
                $this->errorAndExit($this->text('Invalid argument'));
            }

            if ($this->getParam('trigger')) {
                $options = array('trigger_id' => $id);
            } else {
                $result = $this->price_rule->update($id, array('status' => $status));
            }

        } else if ($all) {
            $options = array();
        }

        if (isset($options)) {

            $updated = $count = 0;
            foreach ($this->price_rule->getList($options) as $item) {
                $count++;
                $updated += (int) $this->price_rule->update($item['price_rule_id'], array('status' => $status));
            }

            $result = $count && $count == $updated;
        }

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->output();
    }

}
