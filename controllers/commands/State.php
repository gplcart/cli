<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers\commands;

use gplcart\core\models\CountryState as CountryStateModel;
use gplcart\modules\cli\controllers\Command;

/**
 * Handles commands related to country states
 */
class State extends Command
{

    /**
     * Country state model instance
     * @var \gplcart\core\models\CountryState $state
     */
    protected $state;

    /**
     * @param CountryStateModel $state
     */
    public function __construct(CountryStateModel $state)
    {
        parent::__construct();

        $this->state = $state;
    }

    /**
     * Callback for "state-get" command
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
     */
    public function cmdDeleteState()
    {
        $id = $this->getParam(0);

        if (empty($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        if ($this->getParam('country')) {

            $deleted = $count = 0;
            foreach ($this->state->getList(array('country' => $id)) as $item) {
                $count++;
                $deleted += (int) $this->state->delete($item['state_id']);
            }

            $result = $count && $count == $deleted;
        } else {

            if (!is_numeric($id)) {
                $this->errorAndExit($this->text('Invalid argument'));
            }

            $result = $this->state->delete($id);
        }

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->output();
    }

    /**
     * Callback for "state-add" command
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
     */
    public function cmdUpdateState()
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

        $this->validateComponent('state');

        $this->updateState($params[0]);
        $this->output();
    }

    /**
     * Returns an array of country states
     * @return array
     */
    protected function getListState()
    {
        $id = $this->getParam(0);

        if (!isset($id)) {
            $list = $this->state->getList();
            $this->limitArray($list);
            return $list;
        }

        if ($this->getParam('country')) {
            $list = $this->state->getList(array('country' => $id));
            $this->limitArray($list);
            return $list;
        }

        if (!is_numeric($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        $result = $this->state->get($id);

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        return array($result);
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
     * @param string $state_id
     */
    protected function updateState($state_id)
    {
        if (!$this->isError() && !$this->state->update($state_id, $this->getSubmitted())) {
            $this->errorAndExit($this->text('Unexpected result'));
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
                $this->errorAndExit($this->text('Unexpected result'));
            }
            $this->line($state_id);
        }
    }

    /**
     * Add a new country state step by step
     */
    protected function wizardAddState()
    {
        $this->validatePrompt('code', $this->text('Code'), 'state');
        $this->validatePrompt('name', $this->text('Name'), 'state');
        $this->validatePrompt('country', $this->text('Country'), 'state');
        $this->validatePrompt('zone_id', $this->text('Zone'), 'state', 0);
        $this->validatePrompt('status', $this->text('Status'), 'state', 0);

        $this->validateComponent('state');
        $this->addState();
    }

}
