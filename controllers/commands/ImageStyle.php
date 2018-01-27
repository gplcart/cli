<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers\commands;

use gplcart\core\models\ImageStyle as ImageStyleModel;
use gplcart\modules\cli\controllers\Command;

/**
 * Handles commands related to image styles
 */
class ImageStyle extends Command
{

    /**
     * Image style model class instance
     * @var \gplcart\core\models\ImageStyle $image_style
     */
    protected $image_style;

    /**
     * @param ImageStyleModel $image_style
     */
    public function __construct(ImageStyleModel $image_style)
    {
        parent::__construct();

        $this->image_style = $image_style;
    }

    /**
     * Callback for "imagestyle-update"
     */
    public function cmdUpdateImageStyle()
    {
        $params = $this->getParam();

        if (empty($params[0]) || count($params) < 2) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        if (!is_numeric($params[0])) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        $this->setSubmitted(null, $params);
        $this->setSubmittedList('actions');
        $this->setSubmitted('update', $params[0]);

        $this->validateComponent('image_style');
        $this->updateImageStyle($params[0]);
        $this->output();
    }

    /**
     * Callback for "imagestyle-add"
     */
    public function cmdAddImageStyle()
    {
        if ($this->getParam()) {
            $this->submitAddImageStyle();
        } else {
            $this->wizardAddImageStyle();
        }

        $this->output();
    }

    /**
     * Callback for "imagestyle-delete" command
     */
    public function cmdDeleteImageStyle()
    {
        $id = $this->getParam(0);

        if (empty($id) || !is_numeric($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        if (!$this->image_style->delete($id)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->output();
    }

    /**
     * Callback for "imagestyle-clear-cache" command
     */
    public function cmdClearCacheImageStyle()
    {
        $id = $this->getParam(0);
        $all = $this->getParam('all');

        if (!isset($id) && empty($all)) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        $result = false;

        if (isset($id)) {

            if (!is_numeric($id)) {
                $this->errorAndExit($this->text('Invalid argument'));
            }

            $result = $this->image_style->clearCache($id);
        } else if (!empty($all)) {
            $result = $this->image_style->clearCache();
        }

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->output();
    }

    /**
     * Callback for "imagestyle-get" command
     */
    public function cmdGetImageStyle()
    {
        $list = $this->getListImageStyle();
        $this->outputFormat($list);
        $this->outputFormatTableImageStyle($list);
        $this->output();
    }

    /**
     * Returns an array of image styles
     * @return array
     */
    protected function getListImageStyle()
    {
        $id = $this->getParam(0);

        if (!isset($id)) {
            $list = $this->image_style->getList();
            $this->limitArray($list);
            return $list;
        }

        if (!is_numeric($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        $result = $this->image_style->get($id);

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        return array($result);
    }

    /**
     * Output image styles in a table
     * @param array $items
     */
    protected function outputFormatTableImageStyle(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('Name'),
            $this->text('Default'),
            $this->text('In database'),
            $this->text('Enabled')
        );

        $rows = array();

        foreach ($items as $item) {
            $rows[] = array(
                $item['imagestyle_id'],
                $this->text($item['name']),
                empty($item['default']) ? $this->text('No') : $this->text('Yes'),
                empty($item['in_database']) ? $this->text('No') : $this->text('Yes'),
                empty($item['status']) ? $this->text('No') : $this->text('Yes'),
            );
        }

        $this->outputFormatTable($rows, $header);
    }

    /**
     * Adds an image style
     */
    protected function addImageStyle()
    {
        if (!$this->isError()) {
            $id = $this->image_style->add($this->getSubmitted());
            if (empty($id)) {
                $this->errorAndExit($this->text('Unexpected result'));
            }
            $this->line($id);
        }
    }

    /**
     * Updates an image style
     * @param int $imagestyle_id
     */
    protected function updateImageStyle($imagestyle_id)
    {
        if (!$this->isError() && !$this->image_style->update($imagestyle_id, $this->getSubmitted())) {
            $this->errorAndExit($this->text('Unexpected result'));
        }
    }

    /**
     * Add an image style at once
     */
    protected function submitAddImageStyle()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->setSubmittedList('actions');
        $this->validateComponent('image_style');
        $this->addImageStyle();
    }

    /**
     * Adds an image style step-by-step
     */
    protected function wizardAddImageStyle()
    {
        $this->validatePrompt('name', $this->text('Name'), 'image_style');
        $this->validatePromptList('actions', $this->text('Actions'), 'image_style');
        $this->validatePrompt('status', $this->text('Status'), 'image_style', 0);
        $this->setSubmittedList('actions');

        $this->validateComponent('image_style');
        $this->addImageStyle();
    }

}
