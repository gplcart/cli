<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use gplcart\core\models\Country as CountryModel;
use gplcart\modules\cli\controllers\Base;

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
     * Displays one or several countries
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
     * Add a new country
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
     * Update a country
     */
    public function cmdUpdateCountry()
    {
        $this->submitUpdateCountry();
        $this->output();
    }

    /**
     * Callback for "country-delete" command
     * Delete a country
     */
    public function cmdDeleteCountry()
    {
        $code = $this->getParam(0);

        if (empty($code)) {
            $this->errorExit($this->text('Invalid ID'));
        }

        if (!$this->country->delete($code)) {
            $this->errorExit($this->text('Country has not been deleted'));
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

        if (isset($code)) {
            $country = $this->country->get($code);
            if (empty($country)) {
                $this->errorExit($this->text('Invalid ID'));
            }
            return array($country);
        }

        $list = $this->country->getList();
        $this->limitItems($list);
        return $list;
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
     * Updates an country
     */
    protected function submitUpdateCountry()
    {
        $params = $this->getParam();
        if (empty($params[0]) || count($params) < 2) {
            $this->errorExit($this->text('Invalid command'));
        }

        $this->setSubmitted(null, $this->getParam());
        $this->setSubmitted('update', $params[0]);

        $format = $this->getSubmitted('format');
        if (isset($format)) {
            $this->setSubmitted('format', (array) json_decode($format, true));
        }

        $this->validateComponent('country');
        $this->updateCountry($params[0]);
    }

    /**
     * Updates an country
     * @param string $code
     */
    protected function updateCountry($code)
    {
        if (!$this->isError() && !$this->country->update($code, $this->getSubmitted())) {
            $this->errorExit($this->text('Country has not been updated'));
        }
    }

    /**
     * Add a new country at once
     */
    protected function submitAddCountry()
    {
        $this->setSubmitted(null, $this->getParam());

        $format = $this->getSubmitted('format');
        if (isset($format)) {
            $this->setSubmitted('format', (array) json_decode($format, true));
        }

        $this->validateComponent('country');
        $this->addCountry();
    }

    /**
     * Add a new country
     */
    protected function addCountry()
    {
        if (!$this->isError() && !$this->country->add($this->getSubmitted())) {
            $this->errorExit($this->text('Country has not been added'));
        }
    }

    /**
     * Add a new country step by step
     */
    protected function wizardAddCountry()
    {
        $this->validateInput('code', $this->text('Code'), 'country');
        $this->validateInput('name', $this->text('Name'), 'country', '');
        $this->validateInput('native_name', $this->text('Native name'), 'country', '');
        $this->validateInput('zone_id', $this->text('Zone'), 'country', 0);
        $this->validateInput('status', $this->text('Status'), 'country', 0);
        $this->validateInput('weight', $this->text('Weight'), 'country', 0);

        $this->validateComponent('country');
        $this->addCountry();
    }

}