<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use gplcart\core\models\File as FileModel;

/**
 * Handles commands related to database files
 */
class File extends Base
{

    /**
     * File model instance
     * @var \gplcart\core\models\File $file
     */
    protected $file;

    /**
     * @param FileModel $file
     */
    public function __construct(FileModel $file)
    {
        parent::__construct();

        $this->file = $file;
    }

    /**
     * Callback for "file-get" command
     */
    public function cmdGetFile()
    {
        $result = $this->getListFile();
        $this->outputFormat($result);
        $this->outputFormatTableFile($result);
        $this->output();
    }

    /**
     * Callback for "file-delete" command
     */
    public function cmdDeleteFile()
    {
        $id = $this->getParam(0);
        $all = $this->getParam('all');

        if (empty($id) && empty($all)) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        $options = null;

        if (isset($id)) {

            if ($this->getParam('type')) {
                $options = array('file_type' => $id);
            } else if ($this->getParam('mime')) {
                $options = array('mime_type' => $id);
            } else if ($this->getParam('entity')) {
                $options = array('entity' => $id);
            }

        } else if (!empty($all)) {
            $options = array();
        }

        if (isset($options)) {

            $deleted = $count = 0;
            foreach ($this->file->getList($options) as $item) {
                $count++;
                $deleted += (int) $this->deleteFile($item);
            }

            $result = $count && $count == $deleted;

        } else {

            if (empty($id) || !is_numeric($id)) {
                $this->errorAndExit($this->text('Invalid argument'));
            }

            $result = $this->deleteFile($id);
        }

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->output();
    }

    /**
     * Delete a file
     * @param int|array $file
     * @return bool
     */
    protected function deleteFile($file)
    {
        if ($this->getParam('disk')) {
            return array_sum($this->file->deleteAll($file)) == 2;
        }

        if (isset($file['file_id'])) {
            $file = $file['file_id'];
        }

        return $this->file->delete($file);
    }

    /**
     * Callback for "file-add" command
     */
    public function cmdAddFile()
    {
        if ($this->getParam()) {
            $this->submitAddFile();
        } else {
            $this->wizardAddFile();
        }

        $this->output();
    }

    /**
     * Callback for "file-update" command
     */
    public function cmdUpdateFile()
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
        $this->validateComponent('file');

        $this->updateFile($params[0]);
        $this->output();
    }

    /**
     * Returns an array of files
     * @return array
     */
    protected function getListFile()
    {
        $id = $this->getParam(0);

        if (!isset($id)) {
            return $this->file->getList(array('limit' => $this->getLimit()));
        }

        if ($this->getParam('type')) {
            return $this->file->getList(array('file_type' => $id, 'limit' => $this->getLimit()));
        }

        if ($this->getParam('mime')) {
            return $this->file->getList(array('mime_type' => $id, 'limit' => $this->getLimit()));
        }

        if ($this->getParam('entity')) {
            return $this->file->getList(array('entity' => $id, 'limit' => $this->getLimit()));
        }

        if (!is_numeric($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        $result = $this->file->get($id);

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        return array($result);
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableFile(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('Title'),
            $this->text('Entity'),
            $this->text('Entity ID'),
            $this->text('MIME type'),
            $this->text('Path')
        );

        $rows = array();

        foreach ($items as $item) {
            $rows[] = array(
                $item['file_id'],
                $item['title'],
                $item['entity'],
                $item['entity_id'],
                $item['mime_type'],
                $item['path']
            );
        }

        $this->outputFormatTable($rows, $header);
    }

    /**
     * Add a new file record
     */
    protected function addFile()
    {
        if (!$this->isError()) {
            $id = $this->file->add($this->getSubmitted());
            if (empty($id)) {
                $this->errorAndExit($this->text('Unexpected result'));
            }
            $this->line($id);
        }
    }

    /**
     * Updates a file record
     * @param string $file_id
     */
    protected function updateFile($file_id)
    {
        if (!$this->isError() && !$this->file->update($file_id, $this->getSubmitted())) {
            $this->errorAndExit($this->text('Unexpected result'));
        }
    }

    /**
     * Add a new file record at once
     */
    protected function submitAddFile()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->validateComponent('file');
        $this->addFile();
    }

    /**
     * Add a new file record step by step
     */
    protected function wizardAddFile()
    {
        $this->validatePrompt('path', $this->text('Path'), 'file');
        $this->validatePrompt('entity', $this->text('Entity'), 'file');
        $this->validatePrompt('entity_id', $this->text('Entity ID'), 'file', 0);
        $this->validatePrompt('title', $this->text('Title'), 'file', '');
        $this->validatePrompt('description', $this->text('Description'), 'file', '');
        $this->validatePrompt('weight', $this->text('Weight'), 'file', 0);

        $this->validateComponent('file');
        $this->addFile();
    }

}
