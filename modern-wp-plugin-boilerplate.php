<?php

namespace ModernWpPluginBoilerplate;

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://totalonion.com
 * @since             1.0.0
 * @package           ModernWpPluginBoilerplate
 *
 * @wordpress-plugin
 * Plugin Name:       Modern WP Plugin Boilerplate
 * Plugin URI:        https://github.com/boodle/modern-wp-plugin-boilerplate
 * Description:       A basic plugin structure for you to expand upon.
 * Version:           1.0.0
 * Author:            Ben Broadhurst
 * Author URI:        https://totalonion.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       modern-wp-plugin-boilerplate
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('MODERN_WP_PLUGIN_BOILERPLATE_VERSION', '1.0.0');
define('MODERN_WP_PLUGIN_BOILERPLATE_NAME', 'modern-wp-plugin-boilerplate');
define('MODERN_WP_PLUGIN_BOILERPLATE_NAMESPACE', 'ModernWpPluginBoilerplate');
define('MODERN_WP_PLUGIN_BOILERPLATE_PLUGIN_FOLDER', __DIR__);
define('MODERN_WP_PLUGIN_BOILERPLATE_PLUGIN_URL', plugin_dir_url(__FILE__));

// Autoloaders
require_once MODERN_WP_PLUGIN_BOILERPLATE_PLUGIN_FOLDER . '/autoload.php';
if (file_exists(MODERN_WP_PLUGIN_BOILERPLATE_PLUGIN_FOLDER . '/vendor/autoload.php')) {
    require_once MODERN_WP_PLUGIN_BOILERPLATE_PLUGIN_FOLDER . '/vendor/autoload.php';
}

// Activate and deactivation hooks
register_activation_hook(__FILE__, ['\ModernWpPluginBoilerplate\Core\Activator', 'activate']);
register_deactivation_hook(__FILE__, ['\ModernWpPluginBoilerplate\Core\Deactivator', 'deactivate']);

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function modernWpPluginBoilerplateStart() {
    try {
        $plugin = new ModernWpPluginBoilerplate();
        $plugin->run();
    } catch (\Exception $e) {
        print_r($e->getTrace());
    }
}
modernWpPluginBoilerplateStart();
