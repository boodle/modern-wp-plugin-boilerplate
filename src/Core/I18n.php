<?php

namespace ModernWpPluginBoilerplate\Core;

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://totalonion.com
 * @since      1.0.0
 *
 * @package    ModernWpPluginBoilerplate
 * @subpackage ModernWpPluginBoilerplate/Core
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    ModernWpPluginBoilerplate
 * @subpackage ModernWpPluginBoilerplate/Core
 * @author     Ben Broadhurst <ben@totalonion.com>
 */
class I18n
{
    /**
     * Load the plugin text domain for translation.
     *
     * @since    1.0.0
     */
    public function loadPluginTextdomain()
    {
        load_plugin_textdomain(
            'modern-wp-plugin-boilerplate',
            false,
            dirname(MODERN_WP_PLUGIN_BOILERPLATE_PLUGIN_FOLDER . '/languages/')
        );
    }
}
