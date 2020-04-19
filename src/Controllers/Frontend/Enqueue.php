<?php

namespace ModernWpPluginBoilerplate\Controllers\Frontend;

use ModernWpPluginBoilerplate\Controllers\AbstractController;

class Enqueue extends AbstractController
{
    public function enqueueStyles()
    {
        wp_enqueue_style(
            $this->pluginName,
            MODERN_WP_PLUGIN_BOILERPLATE_PLUGIN_URL.'build/public.css',
            [],
            $this->version,
            'all'
        );
    }

    public function enqueueScripts()
    {
        wp_enqueue_script(
            $this->pluginName,
            MODERN_WP_PLUGIN_BOILERPLATE_PLUGIN_URL.'build/public.js',
            [],
            $this->version,
            false
        );
    }
}
