<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

/**
 * Handles commands related to languages
 */
class Language extends Base
{

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Callback for "language-update"
     */
    public function cmdUpdateLanguage()
    {
        $params = $this->getParam();

        if (empty($params[0]) || count($params) < 2) {
            $this->errorExit($this->text('Invalid command'));
        }

        $this->setSubmitted(null, $params);
        $this->setSubmitted('update', $params[0]);
        $this->validateComponent('language');
        $this->updateLanguage($params[0]);
        $this->output();
    }

    /**
     * Callback for "language-add"
     */
    public function cmdAddLanguage()
    {
        if ($this->getParam()) {
            $this->submitAddLanguage();
        } else {
            $this->wizardAddLanguage();
        }

        $this->output();
    }

    /**
     * Callback for "language-get" command
     */
    public function cmdGetLanguage()
    {
        $list = $this->getListLanguage();
        $this->outputFormat($list);
        $this->outputFormatTableLanguage($list);
        $this->output();
    }

    /**
     * Callback for "language-delete" command
     */
    public function cmdDeleteLanguage()
    {
        $id = $this->getParam(0);
        $all = $this->getParam('all');

        if (!isset($id) && empty($all)) {
            $this->errorExit($this->text('Invalid command'));
        }

        $result = false;

        if (isset($id)) {
            $result = $this->language->delete($id);
        } else if (!empty($all)) {
            $deleted = $count = 0;
            foreach ($this->language->getList(array('in_database' => true)) as $language) {
                $count++;
                $deleted += (int) $this->language->delete($language['code']);
            }
            $result = ($count == $deleted);
        }

        if (!$result) {
            $this->errorExit($this->text('An error occurred'));
        }

        $this->output();
    }

    /**
     * Returns an array of languages
     * @return array
     */
    protected function getListLanguage()
    {
        $id = $this->getParam(0);

        if (!isset($id)) {
            $list = $this->language->getList();
            $this->limitArray($list);
            return $list;
        }

        $result = $this->language->get($id);

        if (empty($result)) {
            $this->errorExit($this->text('Invalid ID'));
        }

        return array($result);
    }

    /**
     * Output formatted table
     * @param array $items
     */
    protected function outputFormatTableLanguage(array $items)
    {
        $header = array(
            $this->text('Code'),
            $this->text('Name'),
            $this->text('Native name'),
            $this->text('Right-to-left'),
            $this->text('Default'),
            $this->text('In database'),
            $this->text('Enabled')
        );

        $rows = array();

        foreach ($items as $item) {
            $rows[] = array(
                $item['code'],
                $this->text($item['name']),
                $item['native_name'],
                empty($item['rtl']) ? $this->text('No') : $this->text('Yes'),
                empty($item['default']) ? $this->text('No') : $this->text('Yes'),
                empty($item['in_database']) ? $this->text('No') : $this->text('Yes'),
                empty($item['status']) ? $this->text('No') : $this->text('Yes'),
            );
        }

        $this->outputFormatTable($rows, $header);
    }

    /**
     * Adds a language
     */
    protected function addLanguage()
    {
        if (!$this->isError() && !$this->language->add($this->getSubmitted())) {
            $this->errorExit($this->text('Language has not been added'));
        }
    }

    /**
     * Updates a language
     * @param string $code
     */
    protected function updateLanguage($code)
    {
        if (!$this->isError() && !$this->language->update($code, $this->getSubmitted())) {
            $this->errorExit($this->text('Language has not been updated'));
        }
    }

    /**
     * Add a language at once
     */
    protected function submitAddLanguage()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->validateComponent('language');
        $this->addLanguage();
    }

    /**
     * Adds a language step by step
     */
    protected function wizardAddLanguage()
    {
        $this->validatePrompt('code', $this->text('Code'), 'language');
        $this->validatePrompt('name', $this->text('Name'), 'language', '');
        $this->validatePrompt('native_name', $this->text('Native name'), 'language', '');
        $this->validatePrompt('status', $this->text('Status'), 'language', 0);
        $this->validatePrompt('default', $this->text('Default') . '?', 'language', 0);
        $this->validatePrompt('weight', $this->text('Weight'), 'language', 0);
        $this->validatePrompt('rtl', $this->text('Right-to-left') . '?', 'language', 0);
        $this->validateComponent('language');
        $this->addLanguage();
    }

}
