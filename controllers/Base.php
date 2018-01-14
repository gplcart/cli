<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli\controllers;

use gplcart\core\CliController;
use gplcart\core\traits\Listing as ListingTrait;

/**
 * Parent controller
 */
class Base extends CliController
{

    use ListingTrait;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Output formatted data
     * @param mixed $data
     */
    protected function outputFormat($data)
    {
        switch ($this->getParam(array('f'))) {
            case 'print-r':
                $this->line(print_r($data, true));
                break;
            case 'var-export':
                $this->line(var_export($data, true));
                break;
            case 'json':
                $this->line(json_encode($data, JSON_PRETTY_PRINT));
                break;
            case 'var-dump':
                ob_start();
                var_dump($data);
                $this->line(ob_get_clean());
                break;
            default:
                return null; // Pass to table formatter
        }

        $this->output();
    }

    /**
     * Output simple table
     * @param mixed $data
     * @param array $header
     */
    protected function outputFormatTable($data, array $header)
    {
        if (!is_array($data)) {
            $this->line(print_r($data, true));
            $this->output();
        }

        foreach ($data as &$row) {

            if (!is_array($row)) {
                $this->errorExit($this->text('Unexpected table row format'));
            }

            ksort($row);

            foreach ($row as &$item) {
                if (is_array($item)) {
                    $item = '-- Array ' . count($item) . ' items --';
                }
            }
        }

        if (empty($data)) {
            $this->line($this->text('No results'));
        } else {
            array_unshift($data, $header);
            $this->table($data);
        }

        $this->output();
    }

    /**
     * Limits an array of items
     * @param array $array
     * @param int|null $limit
     */
    protected function limitItems(&$array, $limit = null)
    {
        if (is_array($array)) {

            if (!isset($limit)) {
                $limit = $this->config->get('module_cli_limit', 100);
            }

            $this->limitList($array, array(0, $this->getParam(array('l'), $limit)));
        }
    }

    /**
     * Returns an array of values separated by pipe
     * @param string $value
     * @return array
     */
    protected function explodeByPipe($value)
    {
        if (is_array($value)) {
            return $value;
        }

        if ($value === '') {
            return array();
        }

        return array_map('trim', explode('|', $value));
    }

}
