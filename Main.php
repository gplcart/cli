<?php

/**
 * @package CLI
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2018, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\cli;

/**
 * Main class for CLI module
 */
class Main
{

    /**
     * Implements hook "cli.route.list"
     * @param mixed $routes
     */
    public function hookCliRouteList(array &$routes)
    {
        $custom = $this->getRoutes();
        $routes = array_merge($routes, $custom);
    }

    /**
     * Returns an array of supported command routes
     * @return array
     */
    public function getRoutes()
    {
        $list = array();

        foreach (glob(__DIR__ . '/config/*.php') as $file) {

            $command = pathinfo($file, PATHINFO_FILENAME);
            $list[$command] = gplcart_config_get($file);

            $method = explode('-', $command);
            $class_name = array_shift($method);

            if (empty($method)) {
                $method = array($class_name);
            }

            array_unshift($method, 'cmd');

            $list[$command]['handlers']['controller'] = array(
                "gplcart\\modules\\cli\\controllers\\$class_name",
                implode('', $method) . $class_name
            );
        }

        return $list;
    }

}