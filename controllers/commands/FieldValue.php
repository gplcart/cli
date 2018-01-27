<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers\commands;

use gplcart\core\models\FieldValue as FieldValueModel;
use gplcart\modules\cli\controllers\Command;

/**
 * Handles commands related to field values
 */
class FieldValue extends Command
{

    /**
     * Field value model instance
     * @var \gplcart\core\models\FieldValue $field_value
     */
    protected $field_value;

    /**
     * @param FieldValueModel $field_value
     */
    public function __construct(FieldValueModel $field_value)
    {
        parent::__construct();

        $this->field_value = $field_value;
    }

    /**
     * Callback for "field-value-get" command
     */
    public function cmdGetFieldValue()
    {
        $result = $this->getListFieldValue();
        $this->outputFormat($result);
        $this->outputFormatTableFieldValue($result);
        $this->output();
    }

    /**
     * Callback for "field-value-delete" command
     */
    public function cmdDeleteFieldValue()
    {
        $id = $this->getParam(0);

        if (empty($id) || !is_numeric($id)) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        if ($this->getParam('field')) {
            $deleted = $count = 0;
            foreach ($this->field_value->getList(array('field_id' => $id)) as $item) {
                $count++;
                $deleted += (int) $this->field_value->delete($item['field_value_id']);
            }

            $result = $count && $count == $deleted;

        } else {
            $result = $this->field_value->delete($id);
        }

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->output();
    }

    /**
     * Callback for "field-value-add" command
     */
    public function cmdAddFieldValue()
    {
        if ($this->getParam()) {
            $this->submitAddFieldValue();
        } else {
            $this->wizardAddFieldValue();
        }

        $this->output();
    }

    /**
     * Callback for "field-value-update" command
     */
    public function cmdUpdateFieldValue()
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
        $this->validateComponent('field_value');

        $this->updateFieldValue($params[0]);
        $this->output();
    }

    /**
     * Returns an array of field values
     * @return array
     */
    protected function getListFieldValue()
    {
        $id = $this->getParam(0);

        if (!isset($id)) {
            return $this->field_value->getList(array('limit' => $this->getLimit()));
        }

        if ($this->getParam('field')) {
            return $this->field_value->getList(array('field_id' => $id, 'limit' => $this->getLimit()));
        }

        if (!is_numeric($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        $result = $this->field_value->get($id);

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        return array($result);
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableFieldValue(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('Name'),
            $this->text('Field ID'),
            $this->text('Color'),
            $this->text('Weight')
        );

        $rows = array();

        foreach ($items as $item) {
            $rows[] = array(
                $item['field_value_id'],
                $item['title'],
                $item['field_id'],
                $item['color'],
                $item['weight']
            );
        }

        $this->outputFormatTable($rows, $header);
    }

    /**
     * Add a new field value
     */
    protected function addFieldValue()
    {
        if (!$this->isError()) {
            $id = $this->field_value->add($this->getSubmitted());
            if (empty($id)) {
                $this->errorAndExit($this->text('Unexpected result'));
            }
            $this->line($id);
        }
    }

    /**
     * Updates a field value
     * @param string $field_value_id
     */
    protected function updateFieldValue($field_value_id)
    {
        if (!$this->isError() && !$this->field_value->update($field_value_id, $this->getSubmitted())) {
            $this->errorAndExit($this->text('Unexpected result'));
        }
    }

    /**
     * Add a new field value at once
     */
    protected function submitAddFieldValue()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->validateComponent('field_value');
        $this->addFieldValue();
    }

    /**
     * Add a new field value step by step
     */
    protected function wizardAddFieldValue()
    {
        // Required
        $this->validatePrompt('title', $this->text('Title'), 'field_value');
        $this->validatePrompt('field_id', $this->text('Field ID'), 'field_value');

        // Optional
        $this->validatePrompt('color', $this->text('Color'), 'field_value', '');
        $this->validatePrompt('weight', $this->text('Weight'), 'field_value', 0);

        $this->validateComponent('field_value');
        $this->addFieldValue();
    }

}
