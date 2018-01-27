<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers\commands;

use gplcart\core\models\Address as AddressModel;
use gplcart\modules\cli\controllers\Command;

/**
 * Handles commands related to user addresses
 */
class Address extends Command
{

    /**
     * Address model instance
     * @var \gplcart\core\models\Address $address
     */
    protected $address;

    /**
     * @param AddressModel $address
     */
    public function __construct(AddressModel $address)
    {
        parent::__construct();

        $this->address = $address;
    }

    /**
     * Callback for "address-get" command
     */
    public function cmdGetAddress()
    {
        $result = $this->getListAddress();
        $this->outputFormat($result);
        $this->outputFormatTableAddress($result);
        $this->output();
    }

    /**
     * Callback for "address-delete" command
     */
    public function cmdDeleteAddress()
    {
        $id = $this->getParam(0);

        if (empty($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        if ($this->getParam('user')) {

            $deleted = $count = 0;
            foreach ($this->address->getList(array('user_id' => $id)) as $item) {
                $count++;
                $deleted += (int) $this->address->delete($item['address_id']);
            }

            $result = $count && $count == $deleted;

        } else {

            if (!is_numeric($id)) {
                $this->errorAndExit($this->text('Invalid argument'));
            }

            $result = $this->address->delete($id);
        }

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->output();
    }

    /**
     * Callback for "address-add" command
     */
    public function cmdAddAddress()
    {
        if ($this->getParam()) {
            $this->submitAddAddress();
        } else {
            $this->wizardAddAddress();
        }

        $this->output();
    }

    /**
     * Callback for "address-update" command
     */
    public function cmdUpdateAddress()
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
        $this->setSubmittedJson('data');
        $this->validateComponent('address');
        $this->updateAddress($params[0]);

        $this->output();
    }

    /**
     * Returns an array of addresses
     * @return array
     */
    protected function getListAddress()
    {
        $id = $this->getParam(0);

        if (!isset($id)) {
            return $this->address->getList(array('limit' => $this->getLimit()));
        }

        if ($this->getParam('user')) {
            return $this->address->getList(array('user_id' => $id, 'limit' => $this->getLimit()));
        }

        if (!is_numeric($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        $result = $this->address->get($id);

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        return array($result);
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableAddress(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('User ID'),
            $this->text('Full name'),
            $this->text('Address'),
            $this->text('City ID'),
            $this->text('Phone')
        );

        $rows = array();
        foreach ($items as $item) {
            $rows[] = array(
                $item['address_id'],
                $item['user_id'],
                $item['full_name'],
                $item['address_id'],
                $item['city_id'],
                $item['phone'],
            );
        }

        $this->outputFormatTable($rows, $header);
    }

    /**
     * Add a new address
     */
    protected function addAddress()
    {
        if (!$this->isError()) {

            $id = $this->address->add($this->getSubmitted());

            if (empty($id)) {
                $this->errorAndExit($this->text('Unexpected result'));
            }

            $this->line($id);
        }
    }

    /**
     * Updates an address
     * @param string $address_id
     */
    protected function updateAddress($address_id)
    {
        if (!$this->isError() && !$this->address->update($address_id, $this->getSubmitted())) {
            $this->errorAndExit($this->text('Unexpected result'));
        }
    }

    /**
     * Add a new address at once
     */
    protected function submitAddAddress()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->setSubmittedJson('data');
        $this->validateComponent('address');
        $this->addAddress();
    }

    /**
     * Add a new address step by step
     */
    protected function wizardAddAddress()
    {
        $types = $this->address->getTypes();
        $this->validateMenu('type', $this->text('Address type'), 'address', array_combine($types, $types), 'shipping');

        $this->validatePrompt('user_id', $this->text('User ID'), 'address');
        $this->validatePrompt('country', $this->text('Country code'), 'address');
        $this->validatePrompt('state_id', $this->text('State ID'), 'address');
        $this->validatePrompt('city_id', $this->text('City ID'), 'address');
        $this->validatePrompt('address_1', $this->text('Address'), 'address');
        $this->validatePrompt('address_2', $this->text('Additional address'), 'address');
        $this->validatePrompt('phone', $this->text('Phone'), 'address');
        $this->validatePrompt('postcode', $this->text('Post code/ZIP'), 'address');
        $this->validatePrompt('company', $this->text('Company'), 'address');
        $this->validatePrompt('fax', $this->text('Fax'), 'address');
        $this->validatePrompt('first_name', $this->text('First name'), 'address');
        $this->validatePrompt('middle_name', $this->text('Middle name'), 'address');
        $this->validatePrompt('last_name', $this->text('Last name'), 'address');
        $this->validatePrompt('data', $this->text('Data'), 'address');

        $this->setSubmittedJson('data');
        $this->validateComponent('address');
        $this->addAddress();
    }

}
