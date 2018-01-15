<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use gplcart\core\models\ImageStyle as ImageStyleModel;
use gplcart\modules\cli\controllers\Base;

/**
 * Handles commands related to image styles
 */
class ImageStyle extends Base
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
     * Update an image style
     */
    public function cmdUpdateImageStyle()
    {
        $this->submitUpdateImageStyle();
        $this->output();
    }

    /**
     * Callback for "imagestyle-add"
     * Adds a new image style
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
     * Delete an image style
     */
    public function cmdDeleteImageStyle()
    {
        $id = $this->getParam(0);

        if (empty($id)) {
            $this->errorExit($this->text('Invalid ID'));
        }

        if (!$this->image_style->delete($id)) {
            $this->errorExit($this->text('Image style has not been deleted'));
        }

        $this->output();
    }

    /**
     * Callback for "imagestyle-clear-cache" command
     * Delete cached images
     */
    public function cmdClearCacheImageStyle()
    {
        $id = $this->getParam(0);
        $all = $this->getParam('all');

        $result = false;

        if (!empty($id)) {
            $result = $this->image_style->clearCache($id);
        } else if (!empty($all)) {
            $result = $this->image_style->clearCache();
        } else {
            $this->errorExit($this->text('Invalid command'));
        }

        if (!$result) {
            $this->errorExit($this->text('An error occurred'));
        }

        $this->output();
    }

    /**
     * Callback for "imagestyle-get" command
     * List one or a list of image styles
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

        if (isset($id)) {
            $result = $this->image_style->get($id);
            if (empty($result)) {
                $this->errorExit($this->text('Invalid ID'));
            }
            return array($result);
        }

        $list = $this->image_style->getList();
        $this->limitItems($list);
        return $list;
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
            if (empty($id) || !is_int($id)) {
                $this->errorExit($this->text('Image style has not been added'));
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
        if (!$this->isError()) {
            if (!$this->image_style->update($imagestyle_id, $this->getSubmitted())) {
                $this->errorExit($this->text('Image style has not been updated'));
            }
        }
    }

    /**
     * Add an image style at once
     */
    protected function submitAddImageStyle()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->setSubmittedActionsImageStyle();
        $this->validateComponent('image_style');
        $this->addImageStyle();
    }

    /**
     * Updates an image style
     */
    protected function submitUpdateImageStyle()
    {
        $params = $this->getParam();
        if (empty($params[0]) || count($params) < 2) {
            $this->errorExit($this->text('Invalid command'));
        }

        $this->setSubmitted(null, $params);
        $this->setSubmittedActionsImageStyle();
        $this->setSubmitted('update', $params[0]);

        $this->validateComponent('image_style');
        $this->updateImageStyle($params[0]);
    }

    /**
     * Adds an image style step-by-step
     */
    protected function wizardAddImageStyle()
    {
        $this->validateInput('name', $this->text('Name'), 'image_style');
        $input = $this->validateInputActionsImageStyle();
        $this->validateInput('status', $this->text('Status'), 'image_style', 0);

        // Restore original actions input
        // After validation it gets modified
        $this->setSubmitted('actions', $input);
        $this->setSubmittedActionsImageStyle();

        $this->validateComponent('image_style');
        $this->addImageStyle();
    }

    /**
     * Validate actions
     * @return string
     */
    protected function validateInputActionsImageStyle()
    {
        $input = $this->prompt($this->text('Actions'));
        if (!$this->isValidInput($this->explodeByPipe($input), 'actions', 'image_style')) {
            $this->errors();
            $this->validateInputActionsImageStyle();
        }

        return $input;
    }

    /**
     * Sets image style actions
     */
    protected function setSubmittedActionsImageStyle()
    {
        $actions = $this->getSubmitted('actions');
        if (isset($actions)) {
            $this->setSubmitted('actions', $this->explodeByPipe($actions));
        }
    }

}
