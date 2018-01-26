<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use gplcart\core\models\Country as CountryModel;

/**
 * Handles commands related to countries
 */
class Country extends Base
{

    /**
     * Country model instance
     * @var \gplcart\core\models\Country $country
     */
    protected $country;

    /**
     * @param CountryModel $country
     */
    public function __construct(CountryModel $country)
    {
        parent::__construct();

        $this->country = $country;
    }

    /**
     * Callback for "country-get" command
     */
    public function cmdGetCountry()
    {
        $result = $this->getListCountry();
        $this->outputFormat($result);
        $this->outputFormatTableCountry($result);
        $this->output();
    }

    /**
     * Callback for "country-add" command
     */
    public function cmdAddCountry()
    {
        if ($this->getParam()) {
            $this->submitAddCountry();
        } else {
            $this->wizardAddCountry();
        }

        $this->output();
    }

    /**
     * Callback for "country-update" command
     */
    public function cmdUpdateCountry()
    {
        $params = $this->getParam();

        if (empty($params[0]) || count($params) < 2) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        $this->setSubmitted(null, $params);
        $this->setSubmitted('update', $params[0]);
        $this->setSubmittedJson('format');
        $this->validateComponent('country');

        $this->updateCountry($params[0]);
        $this->output();
    }

    /**
     * Callback for "country-delete" command
     */
    public function cmdDeleteCountry()
    {
        $code = $this->getParam(0);
        $all = $this->getParam('all');

        if (empty($code) && empty($all)) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        $result = null;

        if (!empty($code)) {
            $result = $this->country->delete($code);
        } else if (!empty($all)) {

            $deleted = $count = 0;
            foreach ($this->country->getList() as $item) {
                $count++;
                $deleted += (int) $this->country->delete($item['code']);
            }

            $result = $count && $count == $deleted;
        }

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->output();
    }

    /**
     * Returns an array of countries
     * @return array
     */
    protected function getListCountry()
    {
        $code = $this->getParam(0);

        if (!isset($code)) {
            return $this->country->getList(array('limit' => $this->getLimit()));
        }

        $country = $this->country->get($code);

        if (empty($country)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        return array($country);
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableCountry(array $items)
    {
        $header = array(
            $this->text('Code'),
            $this->text('Name'),
            $this->text('Native name'),
            $this->text('Weight'),
            $this->text('Enabled')
        );

        $rows = array();

        foreach ($items as $item) {
            $rows[] = array(
                $item['code'],
                $this->truncate($item['name'], 50),
                $this->truncate($item['native_name'], 50),
                $item['weight'],
                empty($item['status']) ? $this->text('No') : $this->text('Yes')
            );
        }

        $this->outputFormatTable($rows, $header);
    }

    /**
     * Add a new country
     */
    protected function addCountry()
    {
        if (!$this->isError() && !$this->country->add($this->getSubmitted())) {
            $this->errorAndExit($this->text('Unexpected result'));
        }
    }

    /**
     * Updates an country
     * @param string $code
     */
    protected function updateCountry($code)
    {
        if (!$this->isError() && !$this->country->update($code, $this->getSubmitted())) {
            $this->errorAndExit($this->text('Unexpected result'));
        }
    }

    /**
     * Add a new country at once
     */
    protected function submitAddCountry()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->setSubmittedJson('format');
        $this->validateComponent('country');
        $this->addCountry();
    }

    /**
     * Add a new country step by step
     */
    protected function wizardAddCountry()
    {
        $this->validatePrompt('code', $this->text('Code'), 'country');
        $this->validatePrompt('name', $this->text('Name'), 'country', '');
        $this->validatePrompt('native_name', $this->text('Native name'), 'country', '');
        $this->validatePrompt('zone_id', $this->text('Zone'), 'country', 0);
        $this->validatePrompt('status', $this->text('Status'), 'country', 0);
        $this->validatePrompt('weight', $this->text('Weight'), 'country', 0);

        $this->validateComponent('country');
        $this->addCountry();
    }

}
