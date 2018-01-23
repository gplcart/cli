<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use gplcart\core\interfaces\Crud as CrudInterface;
use gplcart\core\models\Alias as AliasModel;

/**
 * Handles commands related to URL aliases
 */
class Alias extends Base
{

    /**
     * Alias model instance
     * @var \gplcart\core\models\Alias $alias
     */
    protected $alias;

    /**
     * @param AliasModel $alias
     */
    public function __construct(AliasModel $alias)
    {
        parent::__construct();

        $this->alias = $alias;
    }

    /**
     * Callback for "alias-get" command
     */
    public function cmdGetAlias()
    {
        $result = $this->getListAlias();
        $this->outputFormat($result);
        $this->outputFormatTableAlias($result);
        $this->output();
    }

    /**
     * Callback for "alias-add" command
     */
    public function cmdAddAlias()
    {
        $params = $this->getParam();

        if (count($params) != 3) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        list($entity, $entity_id, $alias) = $params;

        if (empty($entity) || empty($entity_id) || empty($alias) || !is_numeric($entity_id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        if (!$this->alias->loadEntity($entity, $entity_id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        $result = $this->addAlias($entity, $entity_id, $alias);

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->line($result);
        $this->output();
    }

    /**
     * Callback for "alias-generate" command
     */
    public function cmdGenerateAlias()
    {
        $entity = $this->getParam(0);
        $entity_id = $this->getParam(1);
        $all = $this->getParam('all');

        if (empty($entity)) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        if (!isset($entity_id) && empty($all)) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        $result = false;

        if (isset($entity_id)) {

            if (!is_numeric($entity_id)) {
                $this->errorAndExit($this->text('Invalid argument'));
            }

            $data = $this->alias->loadEntity($entity, $entity_id);

            if (empty($data)) {
                $this->errorAndExit($this->text('Invalid argument'));
            }

            $alias = $this->alias->generateEntity($entity, $data);

            if (empty($alias)) {
                $this->errorAndExit($this->text('Unexpected result'));
            }

            $result = $this->addAlias($entity, $entity_id, $alias);

        } else if (!empty($all)) {
            $result = $this->generateListAlias($entity);
        }

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->output();
    }

    /** Add a URL alias
     * @param string $entity
     * @param int $entity_id
     * @param string $alias
     * @return int
     */
    protected function addAlias($entity, $entity_id, $alias)
    {
        $this->alias->delete(array('entity' => $entity, 'entity_id' => $entity_id));

        $data = array(
            'alias' => $alias,
            'entity' => $entity,
            'entity_id' => $entity_id
        );

        return $this->alias->add($data);
    }

    /**
     * Mass generate URL aliases for the given entity
     * @param string $entity
     * @return bool
     */
    protected function generateListAlias($entity)
    {
        if (!$this->alias->isSupportedEntity($entity)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        $model = gplcart_instance_model($entity);

        if (!$model instanceof CrudInterface) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        ini_set('memory_limit', '-1');

        $added = $count = 0;

        foreach ($model->getList() as $item) {

            if (empty($item["{$entity}_id"])) {
                continue;
            }

            $count++;
            $entity_id = $item["{$entity}_id"];

            $this->alias->delete(array('entity' => $entity, 'entity_id' => $entity_id));

            $data = array(
                'entity' => $entity,
                'entity_id' => $entity_id,
                'alias' => $this->alias->generateEntity($entity, $item)
            );

            if ($this->alias->add($data)) {
                $added++;
            }
        }

        return $count && $count == $added;
    }


    /**
     * Callback for "alias-delete" command
     */
    public function cmdDeleteAlias()
    {
        $id = $this->getParam(0);
        $all = $this->getParam('all');

        if (!isset($id) && !$all) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        $options = $result = null;

        if (isset($id)) {

            if ($this->getParam('entity')) {
                $options = array('entity' => $id);
            }

        } else if (!empty($all)) {
            $options = array();
        }

        if (isset($options)) {

            $deleted = $count = 0;
            foreach ($this->alias->getList($options) as $item) {
                $count++;
                $deleted += (int) $this->alias->delete($item['alias_id']);
            }

            $result = $count && $count == $deleted;

        } else if (isset($id)) {

            if (!is_numeric($id)) {
                $this->errorAndExit($this->text('Invalid argument'));
            }

            $result = $this->alias->delete($id);
        }

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        $this->output();
    }

    /**
     * Returns an array of URL aliases
     * @return array
     */
    protected function getListAlias()
    {
        $id = $this->getParam(0);

        if (!isset($id)) {
            return $this->alias->getList(array('limit' => $this->getLimit()));
        }

        if ($this->getParam('entity')) {
            return $this->alias->getList(array('entity' => $id, 'limit' => $this->getLimit()));
        }

        if (!is_numeric($id)) {
            $this->errorAndExit($this->text('Invalid argument'));
        }

        $result = $this->alias->get($id);

        if (empty($result)) {
            $this->errorAndExit($this->text('Unexpected result'));
        }

        return array($result);
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableAlias(array $items)
    {
        $header = array(
            $this->text('ID'),
            $this->text('Alias'),
            $this->text('Entity'),
            $this->text('Entity ID')
        );

        $rows = array();

        foreach ($items as $item) {
            $rows[] = array(
                $item['alias_id'],
                $item['alias'],
                $item['entity'],
                $item['entity_id']
            );
        }

        $this->outputFormatTable($rows, $header);
    }

}
