<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use gplcart\core\models\Zone as ZoneModel;
use gplcart\modules\cli\controllers\Base;

/**
 * Handles commands related to zones
 */
class Zone extends Base
{

    /**
     * Zone model instance
     * @var \gplcart\core\models\Zone $zone
     */
    protected $zone;

    /**
     * @param ZoneModel $zone
     */
    public function __construct(ZoneModel $zone)
    {
        parent::__construct();

        $this->zone = $zone;
    }

    /**
     * Callback for "zone-get" command
     */
    public function cmdGetZone()
    {
        $result = $this->getListZone();
        $this->outputFormat($result);
        $this->outputFormatTableZone($result);
        $this->output();
    }

    /**
     * Callback for "zone-add" command
     * Add a new zone
     */
    public function cmdAddZone()
    {
        if ($this->getParam()) {
            $this->submitAddZone();
        } else {
            $this->wizardAddZone();
        }

        $this->output();
    }

    /**
     * Callback for "zone-update" command
     */
    public function cmdUpdateZone()
    {
        $this->submitUpdateZone();
        $this->output();
    }

    /**
     * Callback for "zone-delete" command
     */
    public function cmdDeleteZone()
    {
        $id = $this->getParam(0);
        $all = $this->getParam('all');

        if (empty($id) && empty($all)) {
            $this->errorExit($this->text('Invalid command'));
        }

        $result = false;

        if (!empty($id)) {
            $result = $this->zone->delete($id);
        } else if (!empty($all)) {
            $deleted = $count = 0;
            foreach ($this->zone->getList() as $zone) {
                $count++;
                $deleted += (int) $this->zone->delete($zone['zone_id']);
            }
            $result = ($count == $deleted);
        }

        if (!$result) {
            $this->errorExit($this->text('An error occurred'));
        }

        $this->output();
    }

    /**
     * Returns an array of zones
     * @return array
     */
    protected function getListZone()
    {
        $code = $this->getParam(0);

        if (isset($code)) {
            $zone = $this->zone->get($code);
            if (empty($zone)) {
                $this->errorExit($this->text('Invalid ID'));
            }
            return array($zone);
        }

        $list = $this->zone->getList();
        $this->limitItems($list);
        return $list;
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableZone(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('Title'),
            $this->text('Enabled')
        );

        $rows = array();
        foreach ($items as $item) {
            $rows[] = array(
                $item['zone_id'],
                $item['title'],
                empty($item['status']) ? $this->text('No') : $this->text('Yes')
            );
        }

        $this->outputFormatTable($rows, $header);
    }

    /**
     * Updates a zone
     */
    protected function submitUpdateZone()
    {
        $params = $this->getParam();
        if (empty($params[0]) || count($params) < 2) {
            $this->errorExit($this->text('Invalid command'));
        }

        $this->setSubmitted(null, $this->getParam());
        $this->setSubmitted('update', $params[0]);

        $this->validateComponent('zone');
        $this->updateZone($params[0]);
    }

    /**
     * Updates a zone
     * @param string $zone_id
     */
    protected function updateZone($zone_id)
    {
        if (!$this->isError() && !$this->zone->update($zone_id, $this->getSubmitted())) {
            $this->errorExit($this->text('Zone has not been updated'));
        }
    }

    /**
     * Add a new zone at once
     */
    protected function submitAddZone()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->validateComponent('zone');
        $this->addZone();
    }

    /**
     * Add a new zone
     */
    protected function addZone()
    {
        if (!$this->isError()) {
            $id = $this->zone->add($this->getSubmitted());
            if (empty($id)) {
                $this->errorExit($this->text('Zone has not been added'));
            }
            $this->line($id);
        }
    }

    /**
     * Add a new zone step by step
     */
    protected function wizardAddZone()
    {
        $this->validateInput('title', $this->text('Title'), 'zone');
        $this->validateInput('status', $this->text('Status'), 'zone', 0);
        $this->validateComponent('zone');
        $this->addZone();
    }

}
