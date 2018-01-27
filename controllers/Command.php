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
use InvalidArgumentException;

/**
 * Parent controller
 */
class Command extends CliController
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
     * @param null|string $default
     * @return null
     */
    protected function outputFormat($data, $default = null)
    {
        switch ($this->getParam(array('f'), $default)) {
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
                $this->errorAndExit($this->text('Unexpected table row format'));
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
     * Returns an array of limits form the limit option or a default value
     * @param array $default_limit
     * @return array
     */
    protected function getLimit(array $default_limit = array())
    {
        if (empty($default_limit)) {
            $default_limit = $this->config->get('module_cli_limit', array(0, 100));
        }

        $limit = $this->getParam('l');

        if (!isset($limit) || !is_numeric($limit)) {
            return $default_limit;
        }

        $exploded = explode(',', $limit, 2);

        if (count($exploded) == 1) {
            array_unshift($exploded, 0);
        }

        return $exploded;
    }

    /**
     * Limits an array of items
     * @param array $array
     * @param array $default_limit
     */
    protected function limitArray(&$array, array $default_limit = array())
    {
        if (is_array($array)) {
            $this->limitList($array, $this->getLimit($default_limit));
        }
    }

    /**
     * Explode a string using a separator character
     * @param string $value
     * @param string|null $separator
     * @return array
     */
    protected function explodeList($value, $separator = null)
    {
        if (is_array($value)) {
            return $value;
        }

        if ($value === '' || !is_string($value)) {
            return array();
        }

        if (!isset($separator)) {
            $separator = $this->config->get('module_cli_list_separator', '|');
        }

        return array_map('trim', explode($separator, $value));
    }

    /**
     * Convert a submitted JSON string into an array or FALSE on error
     * @param string $field
     */
    protected function setSubmittedJson($field)
    {
        $json = $this->getSubmitted($field);

        if (isset($json)) {
            $decoded = json_decode($json, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $this->setSubmitted($field, $decoded);
            } else {
                $decoded = json_decode(base64_decode($json), true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    throw new InvalidArgumentException('Failed to decode the submitted JSON string');
                }
                $this->setSubmitted($field, $decoded);
            }
        }
    }

    /**
     * Converts a submitted string into an array using a character as an separator
     * @param $field
     */
    protected function setSubmittedList($field)
    {
        $value = $this->getSubmitted($field);

        if (isset($value)) {
            $this->setSubmitted($field, $this->explodeList($value));
        }
    }

    /**
     * Validate prompt input when dealing with multiple values separated by a list character
     * @param string $field
     * @param string $label
     * @param string $validator
     * @param null|string $default
     */
    protected function validatePromptList($field, $label, $validator, $default = null)
    {
        $input = $this->prompt($label, $default);

        if ($this->isValidInput($this->explodeList($input), $field, $validator)) {
            $this->setSubmitted($field, $input);
        } else {
            $this->errors();
            $this->validatePromptList($field, $label, $validator, $default);
        }
    }

}
