<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use gplcart\modules\cli\controllers\Base;

/**
 * Handles commands related to database operations
 */
class Database extends Base
{

    /**
     * Database class instance
     * @var \gplcart\core\Database $db
     */
    protected $db;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->db = $this->config->getDb();
    }

    /**
     * Callback for "database-truncate" command
     */
    public function cmdTruncateDatabase()
    {
        $all = $this->getParam('all');
        $tables = $this->getArguments();

        if (empty($tables) && empty($all)) {
            $this->errorExit($this->text('Invalid command'));
        }

        $confirm = null;
        $existing_tables = $this->db->fetchColumnAll('SHOW TABLES');

        if (!empty($tables)) {
            $confirm = $this->choose($this->text('Are you sure you want to empty the tables? It cannot be undone!'));
        } else if (!empty($all)) {
            $confirm = $this->choose($this->text('Are you sure you want to empty ALL tables in the database? It cannot be undone!'));
            $tables = $existing_tables;
        }

        if ($confirm === 'y') {
            foreach (array_intersect($tables, $existing_tables) as $table) {
                $this->db->query("TRUNCATE TABLE `$table`")->execute();
            }
        }

        $this->output();
    }

    /**
     * Callback for "database-drop" command
     */
    public function cmdDropDatabase()
    {
        $all = $this->getParam('all');
        $tables = $this->getArguments();

        if (empty($tables) && empty($all)) {
            $this->errorExit($this->text('Invalid command'));
        }

        $confirm = null;
        $existing_tables = $this->db->fetchColumnAll('SHOW TABLES');

        if (!empty($tables)) {
            $confirm = $this->choose($this->text('Are you sure you want to DELETE the tables? It cannot be undone!'));
        } else if (!empty($all)) {
            $confirm = $this->choose($this->text('Are you sure you want to DELETE ALL tables in the database? It cannot be undone!'));
            $tables = $existing_tables;
        }

        if ($confirm === 'y') {
            foreach (array_intersect($tables, $existing_tables) as $table) {
                $this->db->query("DROP TABLE IF EXISTS `$table`")->execute();
            }
        }

        $this->output();
    }

}
