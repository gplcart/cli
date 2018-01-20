<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use gplcart\core\models\Report as ReportModel;

/**
 * Handles commands related to system events (logs)
 */
class Event extends Base
{

    /**
     * Report model class instance
     * @var \gplcart\core\models\Report $report
     */
    protected $report;

    /**
     * @param ReportModel $report
     */
    public function __construct(ReportModel $report)
    {
        parent::__construct();

        $this->report = $report;
    }

    /**
     * Callback for "event-get" command
     */
    public function cmdGetEvent()
    {
        $result = $this->getListEvent();
        $this->outputFormat($result);
        $this->outputFormatTableEvent($result);
        $this->output();
    }

    /**
     * Callback for "event-delete" command
     */
    public function cmdDeleteEvent()
    {
        if ($this->getParam('expired')) {
            $this->report->deleteExpired();
        } else {
            $this->report->delete();
        }

        $this->output();
    }

    /**
     * Returns an array of events
     * @return array
     */
    protected function getListEvent()
    {
        $options = array(
            'order' => 'desc',
            'sort' => 'created',
            'limit' => $this->getLimit(),
            'severity' => $this->getParam('severity')
        );

        return (array) $this->report->getList($options);
    }

    /**
     * Output events in a table
     * @param array $events
     */
    protected function outputFormatTableEvent(array $events)
    {
        $header = array(
            $this->text('Text'),
            $this->text('Type'),
            $this->text('Severity'),
            $this->text('Created')
        );

        $rows = array();

        foreach ($events as $item) {
            $text = empty($item['translatable']) ? $item['text'] : $this->text($item['text']);
            $rows[] = array(
                $this->truncate($text, 50),
                $this->text($item['type']),
                $this->text($item['severity']),
                $this->date($item['created']),
            );
        }

        $this->outputFormatTable($rows, $header);
    }

}
