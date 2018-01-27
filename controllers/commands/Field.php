<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers\commands;

use gplcart\core\models\Field as FieldModel;
use gplcart\modules\cli\controllers\Command;

/**
 * Handles commands related to fields
 */
class Field extends Command
{

    /**
     * Field model instance
     * @var \gplcart\core\models\Field $field
     */
    protected $field;

    /**
     * @param FieldModel $field
     */
    public function __construct(FieldModel $field)
    {
        parent::__construct();

        $this->field = $field;
    }

    /**
     * Callback for "field-get" command
     */
    public function cmdGetField()
    {
        $result = $this->getListField();
        $this->outputFormat($result);
        $this->outputFormatTableField($result);
        $this->output();
    }

    /**
     * Callback for "field-delete" command
     */
    public function cmdDeleteField()
    {
        $id = $this->getParam(0);
        $all = $this->getParam('all');

        if (empty($id) && empty($all)) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        $options = null;

        if (isset($id)) {

            if ($this->getParam('type')) {
                $options = array('type' => $id);
            } else if ($this->getParam('widget')) {
                $options = array('widget' => $id);
            }

        } else if ($all) {
            $options = array();
        }

        if (isset($options)) {

            $deleted = $count = 0;
            foreach ($this->field->getList($options) as $item) {
                $count++;
                $deleted += (int) $this->field->delete($item['field_id']);
            }

            $result = $count && $count == $deleted;

        } else {

            if (empty($id) || !is_numeric($id)) {
                $this->errorAndExit($this->text('Invalid argument'));
            }

            $result = $this->field->delete($id);
        }

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->output();
    }

    /**
     * Callback for "field-add" command
     */
    public function cmdAddField()
    {
        if ($this->getParam()) {
            $this->submitAddField();
        } else {
            $this->wizardAddField();
        }

        $this->output();
    }

    /**
     * Callback for "field-update" command
     */
    public function cmdUpdateField()
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
        $this->validateComponent('field');

        $this->updateField($params[0]);
        $this->output();
    }

    /**
     * Returns an array of fields
     * @return array
     */
    protected function getListField()
    {
        $id = $this->getParam(0);

        if (!isset($id)) {
            return $this->field->getList(array('limit' => $this->getLimit()));
        }

        if ($this->getParam('type')) {
            return $this->field->getList(array('type' => $id, 'limit' => $this->getLimit()));
        }

        if ($this->getParam('widget')) {
            return $this->field->getList(array('widget' => $id, 'limit' => $this->getLimit()));
        }

        if (!is_numeric($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        $result = $this->field->get($id);

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        return array($result);
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableField(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('Name'),
            $this->text('Type'),
            $this->text('Widget'),
            $this->text('Weight')
        );

        $rows = array();

        foreach ($items as $item) {
            $rows[] = array(
                $item['field_id'],
                $item['title'],
                $item['type'],
                $item['widget'],
                $item['weight']
            );
        }

        $this->outputFormatTable($rows, $header);
    }

    /**
     * Add a new field
     */
    protected function addField()
    {
        if (!$this->isError()) {
            $id = $this->field->add($this->getSubmitted());
            if (empty($id)) {
                $this->errorAndExit($this->text('Unexpected result'));
            }
            $this->line($id);
        }
    }

    /**
     * Updates a field
     * @param string $field_id
     */
    protected function updateField($field_id)
    {
        if (!$this->isError() && !$this->field->update($field_id, $this->getSubmitted())) {
            $this->errorAndExit($this->text('Unexpected result'));
        }
    }

    /**
     * Add a new field at once
     */
    protected function submitAddField()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->validateComponent('field');
        $this->addField();
    }

    /**
     * Add a new field step by step
     */
    protected function wizardAddField()
    {
        // Required
        $this->validatePrompt('title', $this->text('Name'), 'field');
        $this->validateMenu('type', $this->text('Type'), 'field', $this->field->getTypes());
        $this->validateMenu('widget', $this->text('Widget'), 'field', $this->field->getWidgetTypes());

        // Optional
        $this->validatePrompt('status', $this->text('Status'), 'field', 0);
        $this->validatePrompt('weight', $this->text('Weight'), 'field', 0);

        $this->validateComponent('field');
        $this->addField();
    }

}
