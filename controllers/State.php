<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use gplcart\core\models\State as StateModel;
use gplcart\modules\cli\controllers\Base;

/**
 * Handles commands related to country states
 */
class State extends Base
{

    /**
     * Country state model instance
     * @var \gplcart\core\models\State $state
     */
    protected $state;

    /**
     * @param StateModel $state
     */
    public function __construct(StateModel $state)
    {
        parent::__construct();

        $this->state = $state;
    }

    /**
     * Callback for "state-get" command
     * Displays one or several country states
     */
    public function cmdGetState()
    {
        $result = $this->getListState();
        $this->outputFormat($result);
        $this->outputFormatTableState($result);
        $this->output();
    }

    /**
     * Callback for "state-delete" command
     * Delete a country state or all states for a country
     */
    public function cmdDeleteState()
    {
        $id = $this->getParam(0);

        if (empty($id)) {
            $this->errorExit($this->text('Invalid ID'));
        }

        if ($this->getParam('country')) {
            $deleted = $count = 0;
            foreach ($this->state->getList(array('country' => $id)) as $item) {
                $count++;
                $deleted += (int) $this->state->delete($item['state_id']);
            }
            $result = ($count == $deleted);
        } else {
            $result = $this->state->delete($id);
        }

        if (!$result) {
            $this->errorExit($this->text('An error occurred'));
        }

        $this->output();
    }

    /**
     * Callback for "state-add" command
     * Add a new country state
     */
    public function cmdAddState()
    {
        if ($this->getParam()) {
            $this->submitAddState();
        } else {
            $this->wizardAddState();
        }

        $this->output();
    }

    /**
     * Callback for "state-update" command
     * Update a country state
     */
    public function cmdUpdateState()
    {
        $this->submitUpdateState();
        $this->output();
    }

    /**
     * Returns an array of country states
     * @return array
     */
    protected function getListState()
    {
        $id = $this->getParam(0);

        if (isset($id)) {

            if ($this->getParam('country')) {
                $list = $this->state->getList(array('country' => $id));
                $this->limitItems($list);
                return $list;
            }

            $result = $this->state->get($id);
            if (empty($result)) {
                $this->errorExit($this->text('Invalid ID'));
            }
            return array($result);
        }

        $list = $this->state->getList();
        $this->limitItems($list);
        return $list;
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableState(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('Name'),
            $this->text('Code'),
            $this->text('Country'),
            $this->text('Enabled')
        );

        $rows = array();
        foreach ($items as $item) {
            $rows[] = array(
                $item['state_id'],
                $item['name'],
                $item['code'],
                $item['country'],
                empty($item['status']) ? $this->text('No') : $this->text('Yes')
            );
        }

        $this->outputFormatTable($rows, $header);
    }

    /**
     * Updates a country state
     */
    protected function submitUpdateState()
    {
        $params = $this->getParam();
        if (empty($params[0]) || count($params) < 2) {
            $this->errorExit($this->text('Invalid command'));
        }

        $this->setSubmitted(null, $this->getParam());
        $this->setSubmitted('update', $params[0]);

        $this->validateComponent('state');
        $this->updateState($params[0]);
    }

    /**
     * Updates a country state
     * @param string $state_id
     */
    protected function updateState($state_id)
    {
        if (!$this->isError() && !$this->state->update($state_id, $this->getSubmitted())) {
            $this->errorExit($this->text('Country state has not been updated'));
        }
    }

    /**
     * Add a new country state at once
     */
    protected function submitAddState()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->validateComponent('state');
        $this->addState();
    }

    /**
     * Add a new country state
     */
    protected function addState()
    {
        if (!$this->isError()) {
            $state_id = $this->state->add($this->getSubmitted());
            if (empty($state_id)) {
                $this->errorExit($this->text('Country state has not been added'));
            }
            $this->line($state_id);
        }
    }

    /**
     * Add a new country state step by step
     */
    protected function wizardAddState()
    {
        $this->validateInput('code', $this->text('Code'), 'state');
        $this->validateInput('name', $this->text('Name'), 'state');
        $this->validateInput('country', $this->text('Country'), 'state');
        $this->validateInput('zone_id', $this->text('Zone'), 'state', 0);
        $this->validateInput('status', $this->text('Status'), 'state', 0);

        $this->validateComponent('state');
        $this->addState();
    }

}