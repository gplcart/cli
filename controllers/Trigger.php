<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use gplcart\core\models\Trigger as TriggerModel;
use gplcart\modules\cli\controllers\Base;

/**
 * Handles commands related to triggers
 */
class Trigger extends Base
{

    /**
     * Trigger model instance
     * @var \gplcart\core\models\Trigger $trigger
     */
    protected $trigger;

    /**
     * @param TriggerModel $trigger
     */
    public function __construct(TriggerModel $trigger)
    {
        parent::__construct();

        $this->trigger = $trigger;
    }

    /**
     * Callback for "trigger-get" command
     */
    public function cmdGetTrigger()
    {
        $result = $this->getListTrigger();
        $this->outputFormat($result);
        $this->outputFormatTableTrigger($result);
        $this->output();
    }

    /**
     * Callback for "trigger-delete" command
     */
    public function cmdDeleteTrigger()
    {
        $id = $this->getParam(0);

        if (empty($id) || !is_numeric($id)) {
            $this->errorExit($this->text('Invalid ID'));
        }

        if ($this->getParam('store')) {
            $deleted = $count = 0;
            foreach ($this->trigger->getList(array('store_id' => $id)) as $item) {
                $count++;
                $deleted += (int) $this->trigger->delete($item['trigger_id']);
            }

            $result = ($count == $deleted);
        } else {
            $result = $this->trigger->delete($id);
        }

        if (!$result) {
            $this->errorExit($this->text('An error occurred'));
        }

        $this->output();
    }

    /**
     * Callback for "trigger-add" command
     */
    public function cmdAddTrigger()
    {
        if ($this->getParam()) {
            $this->submitAddTrigger();
        } else {
            $this->wizardAddTrigger();
        }

        $this->output();
    }

    /**
     * Callback for "trigger-update" command
     */
    public function cmdUpdateTrigger()
    {
        $params = $this->getParam();

        if (empty($params[0]) || count($params) < 2) {
            $this->errorExit($this->text('Invalid command'));
        }

        $this->setSubmitted(null, $this->getParam());
        $this->setSubmitted('data.conditions', $this->getSubmitted('conditions'));
        $this->setSubmittedConditionsTrigger();
        $this->setSubmitted('update', $params[0]);

        $this->validateComponent('trigger');
        $this->updateTrigger($params[0]);

        $this->output();
    }

    /**
     * Returns an array of triggers
     * @return array
     */
    protected function getListTrigger()
    {
        $id = $this->getParam(0);

        if (isset($id)) {

            if ($this->getParam('store')) {
                $list = $this->trigger->getList(array('store_id' => $id));
                $this->limitItems($list);
                return $list;
            }

            $result = $this->trigger->get($id);

            if (empty($result)) {
                $this->errorExit($this->text('Invalid ID'));
            }

            return array($result);
        }

        $list = $this->trigger->getList();
        $this->limitItems($list);
        return $list;
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableTrigger(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('Name'),
            $this->text('Store'),
            $this->text('Weight'),
            $this->text('Enabled')
        );

        $rows = array();
        foreach ($items as $item) {
            $rows[] = array(
                $item['trigger_id'],
                $item['name'],
                $item['store_id'],
                $item['weight'],
                empty($item['status']) ? $this->text('No') : $this->text('Yes')
            );
        }

        $this->outputFormatTable($rows, $header);
    }

    /**
     * Updates a trigger
     * @param string $trigger_id
     */
    protected function updateTrigger($trigger_id)
    {
        if (!$this->isError() && !$this->trigger->update($trigger_id, $this->getSubmitted())) {
            $this->errorExit($this->text('Trigger has not been updated'));
        }
    }

    /**
     * Add a new trigger at once
     */
    protected function submitAddTrigger()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->setSubmitted('data.conditions', $this->getSubmitted('conditions'));
        $this->setSubmittedConditionsTrigger();
        $this->validateComponent('trigger');
        $this->addTrigger();
    }

    /**
     * Add a new trigger
     */
    protected function addTrigger()
    {
        if (!$this->isError()) {
            $state_id = $this->trigger->add($this->getSubmitted());
            if (empty($state_id)) {
                $this->errorExit($this->text('Trigger has not been added'));
            }
            $this->line($state_id);
        }
    }

    /**
     * Add a trigger step by step
     */
    protected function wizardAddTrigger()
    {
        $this->validateInput('name', $this->text('Name'), 'trigger');
        $this->validateInput('store_id', $this->text('Store'), 'trigger');
        $this->validateInputConditionsTrigger();
        $this->validateInput('status', $this->text('Status'), 'trigger', 0);
        $this->validateInput('weight', $this->text('Weight'), 'trigger', 0);
        $this->setSubmittedConditionsTrigger();

        $this->validateComponent('trigger');
        $this->addTrigger();
    }

    /**
     * Validate conditions
     */
    protected function validateInputConditionsTrigger()
    {
        $input = $this->prompt($this->text('Conditions'));

        if ($this->isValidInput($this->explodeByPipe($input), 'data.conditions', 'trigger')) {
            $this->setSubmitted('data.conditions', $input);
        } else {
            $this->errors();
            $this->validateInputConditionsTrigger();
        }
    }

    /**
     * Sets trigger conditions
     */
    protected function setSubmittedConditionsTrigger()
    {
        $actions = $this->getSubmitted('data.conditions');

        if (isset($actions)) {
            $this->setSubmitted('data.conditions', $this->explodeByPipe($actions));
        }
    }

}