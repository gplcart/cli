<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use gplcart\core\models\City as CityModel;
use gplcart\modules\cli\controllers\Base;

/**
 * Handles commands related to cities
 */
class City extends Base
{

    /**
     * City model instance
     * @var \gplcart\core\models\City $city
     */
    protected $city;

    /**
     * @param CityModel $city
     */
    public function __construct(CityModel $city)
    {
        parent::__construct();

        $this->city = $city;
    }

    /**
     * Callback for "city-get" command
     * Displays one or several cities
     */
    public function cmdGetCity()
    {
        $result = $this->getListCity();
        $this->outputFormat($result);
        $this->outputFormatTableCity($result);
        $this->output();
    }

    /**
     * Callback for "city-delete" command
     * Delete one or several cities
     */
    public function cmdDeleteCity()
    {
        $id = $this->getParam(0);

        if (empty($id)) {
            $this->errorExit($this->text('Invalid ID'));
        }

        $delete_by_state = $this->getParam('state');
        $delete_by_country = $this->getParam('country');

        if ($delete_by_country || $delete_by_state) {

            if ($delete_by_country) {
                $options = array('country' => $id);
            } else {
                $options = array('state_id' => $id);
            }

            $deleted = $count = 0;
            foreach ($this->city->getList($options) as $item) {
                $count++;
                $deleted += (int) $this->city->delete($item['city_id']);
            }

            $result = ($count == $deleted);
        } else {
            $result = $this->city->delete($id);
        }

        if (!$result) {
            $this->errorExit($this->text('An error occurred'));
        }

        $this->output();
    }

    /**
     * Callback for "city-add" command
     * Add a new city
     */
    public function cmdAddCity()
    {
        if ($this->getParam()) {
            $this->submitAddCity();
        } else {
            $this->wizardAddCity();
        }

        $this->output();
    }

    /**
     * Callback for "city-update" command
     * Update a city
     */
    public function cmdUpdateCity()
    {
        $this->submitUpdateCity();
        $this->output();
    }

    /**
     * Returns an array of cities
     * @return array
     */
    protected function getListCity()
    {
        $id = $this->getParam(0);

        if (isset($id)) {

            if ($this->getParam('state')) {
                $list = $this->city->getList(array('state_id' => $id));
                $this->limitItems($list);
                return $list;
            }

            if ($this->getParam('country')) {
                $list = $this->city->getList(array('country' => $id));
                $this->limitItems($list);
                return $list;
            }

            $result = $this->city->get($id);
            if (empty($result)) {
                $this->errorExit($this->text('Invalid ID'));
            }
            return array($result);
        }

        $list = $this->city->getList();
        $this->limitItems($list);
        return $list;
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableCity(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('Name'),
            $this->text('State'),
            $this->text('Country'),
            $this->text('Zone'),
            $this->text('Enabled')
        );

        $rows = array();
        foreach ($items as $item) {
            $rows[] = array(
                $item['city_id'],
                $item['name'],
                $item['state_id'],
                $item['country'],
                $item['zone_id'],
                empty($item['status']) ? $this->text('No') : $this->text('Yes')
            );
        }

        $this->outputFormatTable($rows, $header);
    }

    /**
     * Updates a city
     */
    protected function submitUpdateCity()
    {
        $params = $this->getParam();
        if (empty($params[0]) || count($params) < 2) {
            $this->errorExit($this->text('Invalid command'));
        }

        $this->setSubmitted(null, $this->getParam());
        $this->setSubmitted('update', $params[0]);

        $this->validateComponent('city');
        $this->updateCity($params[0]);
    }

    /**
     * Updates a city
     * @param string $city_id
     */
    protected function updateCity($city_id)
    {
        if (!$this->isError() && !$this->city->update($city_id, $this->getSubmitted())) {
            $this->errorExit($this->text('City has not been updated'));
        }
    }

    /**
     * Add a new city at once
     */
    protected function submitAddCity()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->validateComponent('city');
        $this->addCity();
    }

    /**
     * Add a new city
     */
    protected function addCity()
    {
        if (!$this->isError()) {
            $state_id = $this->city->add($this->getSubmitted());
            if (empty($state_id)) {
                $this->errorExit($this->text('City has not been added'));
            }
            $this->line($state_id);
        }
    }

    /**
     * Add a new city step by step
     */
    protected function wizardAddCity()
    {
        $this->validateNameCity();
        $this->validateStateCity();
        $this->validateCountryCity();
        $this->validateZoneCity();
        $this->validateStatusCity();

        $this->validateComponent('city');
        $this->addCity();
    }

    /**
     * Validates "name" field
     */
    protected function validateNameCity()
    {
        $input = $this->prompt($this->text('Name'));
        if (!$this->isValidInput($input, 'name', 'city')) {
            $this->errors();
            $this->validateNameCity();
        }
    }

    /**
     * Validates "state_id" field
     */
    protected function validateStateCity()
    {
        $input = $this->prompt($this->text('Country state'));
        if (!$this->isValidInput($input, 'state_id', 'city')) {
            $this->errors();
            $this->validateStateCity();
        }
    }

    /**
     * Validates "country" field
     */
    protected function validateCountryCity()
    {
        $input = $this->prompt($this->text('Country'));
        if (!$this->isValidInput($input, 'country', 'city')) {
            $this->errors();
            $this->validateCountryCity();
        }
    }

    /**
     * Validates "zone_id" field
     */
    protected function validateZoneCity()
    {
        $input = $this->prompt($this->text('Zone'), '0');
        if (!$this->isValidInput($input, 'zone_id', 'city')) {
            $this->errors();
            $this->validateZoneCity();
        }
    }

    /**
     * Validates "status" field
     */
    protected function validateStatusCity()
    {
        $input = $this->prompt($this->text('Status'), '0');
        if (!$this->isValidInput($input, 'status', 'city')) {
            $this->errors();
            $this->validateStatusCity();
        }
    }

}
