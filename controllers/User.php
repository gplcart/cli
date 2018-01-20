<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use gplcart\core\models\User as UserModel;

/**
 * Handles commands related to users
 */
class User extends Base
{

    /**
     * User model instance
     * @var \gplcart\core\models\User $user
     */
    protected $user;

    /**
     * @param UserModel $user
     */
    public function __construct(UserModel $user)
    {
        parent::__construct();

        $this->user = $user;
    }

    /**
     * Callback for "user-on" command
     */
    public function cmdOnUser()
    {
        $this->setStatusUser(true);
        $this->output();
    }

    /**
     * Callback for "user-off" command
     */
    public function cmdOffUser()
    {
        $this->setStatusUser(false);
        $this->output();
    }

    /**
     * Callback for "user-get" command
     */
    public function cmdGetUser()
    {
        $result = $this->getListUser();
        $this->outputFormat($result);
        $this->outputFormatTableUser($result);
        $this->output();
    }

    /**
     * Callback for "user-delete" command
     */
    public function cmdDeleteUser()
    {
        $id = $this->getParam(0);

        if (!isset($id) || !is_numeric($id)) {
            $this->errorExit($this->text('Invalid ID'));
        }

        $options = null;

        if ($this->getParam('role')) {
            $options = array('role_id' => $id);
        } else if ($this->getParam('store')) {
            $options = array('store_id' => $id);
        }

        if (isset($options)) {
            $deleted = $count = 0;
            foreach ($this->user->getList($options) as $item) {
                $count++;
                $deleted += (int) $this->user->delete($item['user_id']);
            }
            $result = ($count == $deleted);
        } else {
            $result = $this->user->delete($id);
        }

        if (!$result) {
            $this->errorExit($this->text('An error occurred'));
        }

        $this->output();
    }

    /**
     * Callback for "user-add" command
     */
    public function cmdAddUser()
    {
        if ($this->getParam()) {
            $this->submitAddUser();
        } else {
            $this->wizardAddUser();
        }

        $this->output();
    }

    /**
     * Callback for "user-update" command
     */
    public function cmdUpdateUser()
    {
        $params = $this->getParam();

        if (empty($params[0]) || count($params) < 2) {
            $this->errorExit($this->text('Invalid command'));
        }

        if (!is_numeric($params[0])) {
            $this->errorExit($this->text('Invalid ID'));
        }

        $this->setSubmitted(null, $this->getParam());
        $this->setSubmitted('update', $params[0]);
        $this->setSubmittedJson('data');
        $this->validateComponent('user', array('admin' => true));
        $this->updateUser($params[0]);
        $this->output();
    }

    /**
     * Returns an array of users
     * @return array
     */
    protected function getListUser()
    {
        $id = $this->getParam(0);

        if (!isset($id)) {
            return $this->user->getList(array('limit' => $this->getLimit()));
        }

        if (!is_numeric($id)) {
            $this->errorExit($this->text('Invalid ID'));
        }

        $result = $this->user->get($id);

        if (empty($result)) {
            $this->errorExit($this->text('Invalid ID'));
        }

        return array($result);
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableUser(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('Name'),
            $this->text('E-mail'),
            $this->text('Role'),
            $this->text('Store'),
            $this->text('Enabled'),
            $this->text('Created'),
        );

        $rows = array();

        foreach ($items as $item) {
            $rows[] = array(
                $item['user_id'],
                $item['name'],
                $item['email'],
                $item['role_id'],
                $item['store_id'],
                empty($item['status']) ? $this->text('No') : $this->text('Yes'),
                $this->date($item['created'])
            );
        }

        $this->outputFormatTable($rows, $header);
    }

    /**
     * Updates a user
     * @param string $user_id
     */
    protected function updateUser($user_id)
    {
        if (!$this->isError() && !$this->user->update($user_id, $this->getSubmitted())) {
            $this->errorExit($this->text('User has not been updated'));
        }
    }

    /**
     * Add a new user at once
     */
    protected function submitAddUser()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->setSubmittedJson('data');
        $this->validateComponent('user');
        $this->addUser();
    }

    /**
     * Add a new user
     */
    protected function addUser()
    {
        if (!$this->isError()) {
            $id = $this->user->add($this->getSubmitted());
            if (empty($id)) {
                $this->errorExit($this->text('User has not been added'));
            }
            $this->line($id);
        }
    }

    /**
     * Add a new user step by step
     */
    protected function wizardAddUser()
    {
        // Required
        $this->validatePrompt('email', $this->text('E-mail'), 'user');
        $this->validatePrompt('password', $this->text('Password'), 'user');
        $this->validatePrompt('name', $this->text('Name'), 'user');

        // Optional
        $this->validatePrompt('role_id', $this->text('Role ID'), 'user', 0);
        $this->validatePrompt('store_id', $this->text('Store ID'), 'user', $this->config->get('store', 1));
        $this->validatePrompt('timezone', $this->text('Timezone'), 'user', $this->config->get('timezone', 'Europe/London'));
        $this->validatePrompt('status', $this->text('Status'), 'user', 0);
        $this->validatePrompt('data', $this->text('Data'), 'user');

        $this->setSubmittedJson('data');
        $this->validateComponent('user');
        $this->addUser();
    }

    /**
     * Sets a user status
     * @param $status
     */
    public function setStatusUser($status)
    {
        $options = $id = $result = null;

        if ($this->getParam('all')) {
            $options = array();
        } else {

            $id = $this->getParam(0);

            if (!is_numeric($id)) { // Allow 0 for roleless users
                $this->errorExit($this->text('Invalid ID'));
            }

            if ($this->getParam('role')) {
                $options = array('role_id' => $id);
            } else if ($this->getParam('store')) {
                $options = array('store_id' => $id);
            }
        }

        if (isset($options)) {
            $updated = $count = 0;
            foreach ($this->user->getList($options) as $item) {
                $count++;
                $updated += (int) $this->user->update($item['user_id'], array('status' => (bool) $status));
            }
            $result = ($count == $updated);
        } else if (isset($id)) {
            $result = $this->user->update($id, array('status' => (bool) $status));
        }

        if (empty($result)) {
            $this->errorExit($this->text('An error occurred'));
        }
    }

}