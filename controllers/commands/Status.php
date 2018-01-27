<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers\commands;

use gplcart\core\models\Report as ReportModel;
use gplcart\modules\cli\controllers\Command;

/**
 * Handles commands related to system status reporting
 */
class Status extends Command
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
     * Callback for "status" command
     */
    public function cmdStatusStatus()
    {
        $result = $this->report->getStatus();
        $this->outputFormat($result);
        $this->outputFormatTableStatus($result);
        $this->output();
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableStatus(array $items)
    {
        $header = array(
            $this->text('Name'),
            $this->text('Status')
        );

        $rows = array();

        foreach ($items as $item) {
            $rows[] = array(
                $item['title'],
                $item['status']
            );
        }

        $this->outputFormatTable($rows, $header);
    }

}
