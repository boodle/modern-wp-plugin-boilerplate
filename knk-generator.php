<?php

namespace KnkGenerator;

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
 * @package           Knk_Generator
 *
 * @wordpress-plugin
 * Plugin Name:       KNK generator
 * Plugin URI:        https://github.com/TotalOnion/knk-generator
 * Description:       Connect to the multiverse
 * Version:           1.0.0
 * Author:            Ben Broadhurst
 * Author URI:        https://totalonion.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       knk-generator
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'KNK_GENERATOR_VERSION', '1.0.0' );
require_once __DIR__ . '/autoloader.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-knk-generator-activator.php
 */
function activate_knk_generator() {
	//require_once plugin_dir_path( __FILE__ ) . 'includes/class-knk-generator-activator.php';
	Knk_Generator_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-knk-generator-deactivator.php
 */
function deactivate_knk_generator() {
	//require_once plugin_dir_path( __FILE__ ) . 'includes/class-knk-generator-deactivator.php';
	Knk_Generator_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_knk_generator' );
register_deactivation_hook( __FILE__, 'deactivate_knk_generator' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
//require plugin_dir_path( __FILE__ ) . 'includes/class-knk-generator.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_knk_generator() {

	$plugin = new Knk_Generator();
	$plugin->run();

}
run_knk_generator();
