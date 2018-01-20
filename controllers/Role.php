<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use gplcart\core\models\UserRole as UserRoleModel;
use gplcart\modules\cli\controllers\Base;

/**
 * Handles commands related to user roles
 */
class Role extends Base
{

    /**
     * Role model instance
     * @var \gplcart\core\models\UserRole $role
     */
    protected $role;

    /**
     * @param UserRoleModel $role
     */
    public function __construct(UserRoleModel $role)
    {
        parent::__construct();

        $this->role = $role;
    }

    /**
     * Callback for "role-perm-add" command
     */
    public function cmdPermAddRole()
    {
        list($role_id, $existing, $submitted) = $this->getPermissionsRole();

        $data = array('permissions' => array_unique(array_merge($existing, $submitted)));

        $this->setSubmitted(null, $data);
        $this->setSubmitted('update', $role_id);
        $this->validateComponent('user_role');
        $this->updateRole($role_id);
        $this->output();
    }

    /**
     * Callback for "role-perm-delete" command
     */
    public function cmdPermDeleteRole()
    {
        list($role_id, $existing, $submitted) = $this->getPermissionsRole();

        $data = array(
            'permissions' => array_unique(array_diff($existing, $submitted))
        );

        $this->setSubmitted(null, $data);
        $this->setSubmitted('update', $role_id);
        $this->validateComponent('user_role');
        $this->updateRole($role_id);
        $this->output();
    }

    /**
     * Callback for "role-get" command
     */
    public function cmdGetRole()
    {
        $result = $this->getListRole();
        $this->outputFormat($result);
        $this->outputFormatTableRole($result);
        $this->output();
    }

    /**
     * Callback for "role-delete" command
     */
    public function cmdDeleteRole()
    {
        $id = $this->getParam(0);
        $all = $this->getParam('all');

        if (empty($id) && empty($all)) {
            $this->errorExit($this->text('Invalid command'));
        }

        $result = false;

        if (!empty($id)) {

            if (!is_numeric($id)) {
                $this->errorExit($this->text('Invalid ID'));
            }

            $result = $this->role->delete($id);

        } else if ($all) {
            $deleted = $count = 0;
            foreach ($this->role->getList() as $item) {
                $count++;
                $deleted += (int) $this->role->delete($item['role_id']);
            }

            $result = ($count == $deleted);
        }

        if (!$result) {
            $this->errorExit($this->text('An error occurred'));
        }

        $this->output();
    }

    /**
     * Callback for "role-add" command
     */
    public function cmdAddRole()
    {
        if ($this->getParam()) {
            $this->submitAddRole();
        } else {
            $this->wizardAddRole();
        }

        $this->output();
    }

    /**
     * Callback for "role-update" command
     */
    public function cmdUpdateRole()
    {
        $params = $this->getParam();

        if (empty($params[0]) || count($params) < 2) {
            $this->errorExit($this->text('Invalid command'));
        }

        if (!is_numeric($params[0])) {
            $this->errorExit($this->text('Invalid ID'));
        }

        $this->setSubmitted(null, $this->getParam());
        $this->setSubmittedList('permissions');
        $this->setSubmitted('update', $params[0]);
        $this->validateComponent('user_role');
        $this->updateRole($params[0]);
        $this->output();
    }

    /**
     * Returns an array of user roles
     * @return array
     */
    protected function getListRole()
    {
        $id = $this->getParam(0);

        if (!isset($id)) {
            return $this->role->getList(array('limit' => $this->getLimit()));
        }

        if (empty($id) || !is_numeric($id)) {
            $this->errorExit($this->text('Invalid ID'));
        }

        $result = $this->role->get($id);

        if (empty($result)) {
            $this->errorExit($this->text('Invalid ID'));
        }

        return array($result);
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableRole(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('Name'),
            $this->text('Redirect'),
            $this->text('Permissions'),
            $this->text('Enabled')
        );

        $rows = array();
        foreach ($items as $item) {
            $rows[] = array(
                $item['role_id'],
                $item['name'],
                $item['redirect'],
                count($item['permissions']),
                empty($item['status']) ? $this->text('No') : $this->text('Yes')
            );
        }

        $this->outputFormatTable($rows, $header);
    }

    /**
     * Returns an array containing parsed submitted data, such as:
     * role ID, the role permissions, submitted permissions
     * @return array
     */
    protected function getPermissionsRole()
    {
        $arguments = $this->getArguments();

        if (count($arguments) < 2) {
            $this->errorExit($this->text('Invalid command'));
        }

        $role_id = array_shift($arguments);

        if (!is_numeric($role_id)) {
            $this->errorExit($this->text('Invalid ID'));
        }

        $role = $this->role->get($role_id);

        if (!isset($role['permissions'])) {
            $this->errorExit($this->text('Invalid ID'));
        }

        return array($role_id, $role['permissions'], $arguments);
    }

    /**
     * Updates a user role
     * @param string $role_id
     */
    protected function updateRole($role_id)
    {
        if (!$this->isError() && !$this->role->update($role_id, $this->getSubmitted())) {
            $this->errorExit($this->text('Role has not been updated'));
        }
    }

    /**
     * Add a new user role at once
     */
    protected function submitAddRole()
    {
        $this->setSubmitted(null, $this->getParam());
        $this->setSubmittedList('permissions');
        $this->validateComponent('user_role');
        $this->addRole();
    }

    /**
     * Add a new user role
     */
    protected function addRole()
    {
        if (!$this->isError()) {
            $id = $this->role->add($this->getSubmitted());
            if (empty($id)) {
                $this->errorExit($this->text('Role has not been added'));
            }
            $this->line($id);
        }
    }

    /**
     * Add a new user role step by step
     */
    protected function wizardAddRole()
    {
        $this->validatePrompt('name', $this->text('Name'), 'user_role');
        $this->validatePromptList('permissions', $this->text('Permissions'), 'user_role');
        $this->validatePrompt('redirect', $this->text('Redirect'), 'user_role', '');
        $this->validatePrompt('status', $this->text('Status'), 'user_role', 0);
        $this->setSubmittedList('permissions');
        $this->validateComponent('user_role');
        $this->addRole();
    }

}
