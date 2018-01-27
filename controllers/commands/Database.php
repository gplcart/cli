<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers\commands;

use gplcart\modules\cli\controllers\Command;

/**
 * Handles commands related to database operations
 */
class Database extends Command
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
            $this->errorAndExit($this->text('Invalid command'));
        }

        $confirm = null;

        if (!empty($tables)) {
            $confirm = $this->choose($this->text('Are you sure you want to empty the tables? It cannot be undone!'));
        } else if (!empty($all)) {
            $confirm = $this->choose($this->text('Are you sure you want to empty ALL tables in the database? It cannot be undone!'));
            $tables = $this->db->fetchColumnAll('SHOW TABLES');
        }

        if ($confirm === 'y') {
            foreach ($tables as $table) {
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
            $this->errorAndExit($this->text('Invalid command'));
        }

        $confirm = null;

        if (!empty($tables)) {
            $confirm = $this->choose($this->text('Are you sure you want to DELETE the tables? It cannot be undone!'));
        } else if (!empty($all)) {
            $confirm = $this->choose($this->text('Are you sure you want to DELETE ALL tables in the database? It cannot be undone!'));
            $tables = $this->db->fetchColumnAll('SHOW TABLES');
        }

        if ($confirm === 'y') {
            foreach ($tables as $table) {
                $this->db->query("DROP TABLE IF EXISTS `$table`")->execute();
            }
        }

        $this->output();
    }

    /**
     * Callback for "database-add" command
     */
    public function cmdAddDatabase()
    {
        $table = $this->getParam(0);
        $data = $this->getOptions();

        if (empty($table) || empty($data)) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        $this->line($this->db->insert($table, $data));
        $this->output();
    }

    /**
     * Callback for "database-delete" command
     */
    public function cmdDeleteDatabase()
    {
        $table = $this->getParam(0);
        $conditions = $this->getOptions();

        if (empty($table) || empty($conditions)) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        if (!$this->db->delete($table, $conditions)) {
            $this->errorAndExit($this->text('An error occurred'));
        }

        $this->output();
    }

    /**
     * Callback for "database-sql" command
     */
    public function cmdSqlDatabase()
    {
        $sql = $this->getParam(0);

        if (empty($sql)) {
            $this->errorAndExit($this->text('Invalid command'));
        }

        $result = $this->db->query($sql);

        if ($this->getParam('fetch')) {
            $result = $result->fetchAll(\PDO::FETCH_ASSOC);
            $this->outputFormat($result);
            $this->outputFormatTableDatabase($result);
        }

        $this->output();
    }

    /**
     * Output table format
     * @param array $items
     */
    protected function outputFormatTableDatabase(array $items)
    {
        $header = $rows = array();

        if (!empty($items)) {

            $first = reset($items);
            $header = array_keys($first);

            foreach ($items as $item) {
                $rows[] = array_values($item);
            }
        }

        $this->outputFormatTable($rows, $header);
    }

}
