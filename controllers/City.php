<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use gplcart\core\models\City as CityModel;

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
     * @param CityModel $alias
     */
    public function __construct(CityModel $alias)
    {
        parent::__construct();

        $this->city = $alias;
    }

    /**
     * Callback for "city-get" command
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
     */
    public function cmdDeleteCity()
    {
        $id = $this->getParam(0);

        if (empty($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        $options = null;

        if ($this->getParam('state')) {
            $options = array('state_id' => $id);
        } else if ($this->getParam('country')) {
            $options = array('country' => $id);
        }

        if (isset($options)) {

            $deleted = $count = 0;
            foreach ($this->city->getList($options) as $item) {
                $count++;
                $deleted += (int) $this->city->delete($item['city_id']);
            }

            $result = $count && $count == $deleted;
        } else {
            $result = $this->city->delete($id);
        }

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->output();
    }

    /**
     * Callback for "city-add" command
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
     */
    public function cmdUpdateCity()
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
        $this->validateComponent('city');

        $this->updateCity($params[0]);
        $this->output();
    }

    /**
     * Returns an array of cities
     * @return array
     */
    protected function getListCity()
    {
        $id = $this->getParam(0);

        if (!isset($id)) {
            return $this->city->getList(array('limit' => $this->getLimit()));
        }

        if ($this->getParam('state')) {
            return $this->city->getList(array('state_id' => $id, 'limit' => $this->getLimit()));
        }

        if ($this->getParam('country')) {
            return $this->city->getList(array('country' => $id, 'limit' => $this->getLimit()));
        }

        if (!is_numeric($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        $result = $this->city->get($id);

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        return array($result);
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
     * Add a new city
     */
    protected function addCity()
    {
        if (!$this->isError()) {
            $id = $this->city->add($this->getSubmitted());
            if (empty($id)) {
                $this->errorAndExit($this->text('Unexpected result'));
            }
            $this->line($id);
        }
    }

    /**
     * Updates a city
     * @param string $city_id
     */
    protected function updateCity($city_id)
    {
        if (!$this->isError() && !$this->city->update($city_id, $this->getSubmitted())) {
            $this->errorAndExit($this->text('Unexpected result'));
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
     * Add a new city step by step
     */
    protected function wizardAddCity()
    {
        $this->validatePrompt('name', $this->text('Name'), 'city');
        $this->validatePrompt('state_id', $this->text('State'), 'city');
        $this->validatePrompt('country', $this->text('Country'), 'city');
        $this->validatePrompt('zone_id', $this->text('Zone'), 'city', 0);
        $this->validatePrompt('status', $this->text('Status'), 'city', 0);

        $this->validateComponent('city');
        $this->addCity();
    }

}
