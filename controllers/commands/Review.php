<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers\commands;

use gplcart\core\models\Review as ReviewModel;
use gplcart\modules\cli\controllers\Command;

/**
 * Handles commands related to product reviews
 */
class Review extends Command
{

    /**
     * Review model instance
     * @var \gplcart\core\models\Review $review
     */
    protected $review;

    /**
     * @param ReviewModel $review_id
     */
    public function __construct(ReviewModel $review_id)
    {
        parent::__construct();

        $this->review = $review_id;
    }

    /**
     * Callback for "review-get" command
     */
    public function cmdGetReview()
    {
        $result = $this->getListReview();
        $this->outputFormat($result);
        $this->outputFormatTableReview($result);
        $this->output();
    }

    /**
     * Callback for "review-delete" command
     */
    public function cmdDeleteReview()
    {
        $id = $this->getParam(0);
        $all = $this->getParam('all');

        if (!isset($id) && empty($all)) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        if (isset($id) && (empty($id) || !is_numeric($id))) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        $options = null;

        if (isset($id)) {

            if ($this->getParam('user')) {
                $options = array('user_id' => $id);
            } else if ($this->getParam('product')) {
                $options = array('product_id' => $id);
            }

        } else if (!empty($all)) {
            $options = array();
        }

        if (isset($options)) {

            $deleted = $count = 0;
            foreach ($this->review->getList($options) as $item) {
                $count++;
                $deleted += (int) $this->review->delete($item['review_id']);
            }

            $result = $count && $count == $deleted;

        } else if (!empty($id)) {
            $result = $this->review->delete($id);
        }

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->output();
    }

    /**
     * Callback for "review-on" command
     */
    public function cmdOnReview()
    {
        $this->setStatusReview(true);
        $this->output();
    }

    /**
     * Callback for "review-off" command
     */
    public function cmdOffReview()
    {
        $this->setStatusReview(false);
        $this->output();
    }

    /**
     * Sets status for one or several reviews
     * @param bool $status
     */
    protected function setStatusReview($status)
    {
        $id = $this->getParam(0);
        $all = $this->getParam('all');

        if (!isset($id) && empty($all)) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        if (isset($id) && (empty($id) || !is_numeric($id))) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        $options = null;

        if (isset($id)) {

            if ($this->getParam('user')) {
                $options = array('user_id' => $id);
            } else if ($this->getParam('product')) {
                $options = array('product_id' => $id);
            }

        } else if (!empty($all)) {
            $options = array();
        }

        if (isset($options)) {

            $deleted = $count = 0;
            foreach ($this->review->getList($options) as $item) {
                $count++;
                $deleted += (int) $this->review->update($item['review_id'], array('status' => $status));
            }

            $result = $count && $count == $deleted;

        } else if (!empty($id)) {
            $result = $this->review->update($id, array('status' => $status));
        }

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }
    }

    /**
     * Callback for "review-add" command
     */
    public function cmdAddReview()
    {
        if ($this->getParam()) {
            $this->submitAddReview();
        } else {
            $this->wizardAddReview();
        }

        $this->output();
    }

    /**
     * Callback for "review-update" command
     */
    public function cmdUpdateReview()
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
        $this->validateComponent('review');

        $this->updateReview($params[0]);
        $this->output();
    }

    /**
     * Returns an array of reviews
     * @return array
     */
    protected function getListReview()
    {
        $id = $this->getParam(0);

        if (!isset($id)) {
            return $this->review->getList(array('limit' => $this->getLimit()));
        }

        if (!is_numeric($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        if ($this->getParam('user')) {
            return $this->review->getList(array('user_id' => $id, 'limit' => $this->getLimit()));
        }

        if ($this->getParam('product')) {
            return $this->review->getList(array('product_id' => $id, 'limit' => $this->getLimit()));
        }

        $result = $this->review->get($id);

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        return array($result);
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableReview(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('User'),
            $this->text('Product'),
            $this->text('Text'),
            $this->text('Status'),
            $this->text('Created')
        );

        $rows = array();

        foreach ($items as $item) {
            $rows[] = array(
                $item['review_id'],
                $item['user_id'],
                $item['product_id'],
                $this->truncate($item['text'], 50),
                $item['status'],
                $this->date($item['created'])
            );
        }

        $this->outputFormatTable($rows, $header);
    }

    /**
     * Add a new review
     */
    protected function addReview()
    {
        if (!$this->isError()) {
            $id = $this->review->add($this->getSubmitted());
            if (empty($id)) {
                $this->errorAndExit($this->text('Unexpected result'));
            }
            $this->line($id);
        }
    }

    /**
     * Updates a review
     * @param string $review_id
     */
    protected function updateReview($review_id)
    {
        if (!$this->isError() && !$this->review->update($review_id, $this->getSubmitted())) {
            $this->errorAndExit($this->text('Unexpected result'));
        }
    }

    /**
     * Add a new review at once
     */
    protected function submitAddReview()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->validateComponent('review');
        $this->addReview();
    }

    /**
     * Add a new review step by step
     */
    protected function wizardAddReview()
    {
        $this->validatePrompt('user_id', $this->text('User'), 'review');
        $this->validatePrompt('product_id', $this->text('Product'), 'review');
        $this->validatePrompt('text', $this->text('Text'), 'review');
        $this->validatePrompt('status', $this->text('Status'), 'review', 0);

        $this->validateComponent('review');
        $this->addReview();
    }

}
