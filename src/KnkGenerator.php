<?php

namespace KnkGenerator;

use KnkGenerator\Core;
use KnkGenerator\Controllers\Admin;
use KnkGenerator\Controllers\Frontend;

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://totalonion.com
 * @since      1.0.0
 *
 * @package    Knk_Generator
 * @subpackage Knk_Generator/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    KnkGenerator
 * @author     Ben Broadhurst <ben@totalonion.com>
 */
class KnkGenerator {

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      KnkGeneratorLoader    $loader    Maintains and registers all hooks for the plugin.
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $pluginName    The string used to uniquely identify this plugin.
     */
    protected $pluginName;

    /**
     * The current version of the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $version    The current version of the plugin.
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function __construct() {
        $this->version = KNK_GENERATOR_VERSION;
        $this->pluginName = KNK_GENERATOR_NAME;

        $this->loader = new Core\Loader();
        $this->setLocale();
        $this->defineAdminHooks();
        $this->definePublicHooks();
    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the KnkGenerator\Core\Internationalisation class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function setLocale()
    {
        $i18n = new Core\I18n();
        $this->loader->addAction('plugins_loaded', $i18n, 'loadPluginTextdomain');

    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function defineAdminHooks()
    {
        $enqueue = new Admin\AdminEnqueue($this->getPluginName(), $this->getVersion());
        $this->loader->addAction('admin_enqueue_scripts', $enqueue, 'enqueueStyles');
        $this->loader->addAction('admin_enqueue_scripts', $enqueue, 'enqueueScripts');

    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function definePublicHooks()
    {
        // Enqueue scripts
        $enqueue = new Frontend\FrontendEnqueue($this->getPluginName(), $this->getVersion());
        $this->loader->addAction('wp_enqueue_scripts', $enqueue, 'enqueueStyles');
        $this->loader->addAction('wp_enqueue_scripts', $enqueue, 'enqueueScripts');

        // Shortcodes
        $shortcodes = new Frontend\Shortcodes($this->getPluginName(), $this->getVersion());
        $this->loader->addAction('init', $shortcodes, 'addShortcodes');
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    1.0.0
     */
    public function run()
    {
        $this->loader->run();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since     1.0.0
     * @return    string    The name of the plugin.
     */
    public function getPluginName()
    {
        return $this->pluginName;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since     1.0.0
     * @return    Knk_Generator_Loader    Orchestrates the hooks of the plugin.
     */
    public function getLoader()
    {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since     1.0.0
     * @return    string    The version number of the plugin.
     */
    public function getVersion()
    {
        return $this->version;
    }
}
