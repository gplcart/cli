<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use gplcart\core\models\Cron as CronModel;

/**
 * Handles commands related to CRON
 */
class Cron extends Base
{

    /**
     * Cron model class instance
     * @var \gplcart\core\models\Cron $cron
     */
    protected $cron;

    /**
     * @param CronModel $cron
     */
    public function __construct(CronModel $cron)
    {
        parent::__construct();

        $this->cron = $cron;
    }

    /**
     * Callback for "cron" command
     * Run CRON
     */
    public function cmdCronCron()
    {
        if (!$this->cron->run()) {
            $this->errorExit($this->text('An error occurred'));
        }

        $this->output();
    }

}
