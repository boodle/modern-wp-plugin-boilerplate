<?php

namespace KnkGenerator\Controllers\Admin;

use KnkGenerator\Controllers\AbstractController;

class AdminEnqueue extends AbstractController
{
    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueueStyles()
    {
        wp_enqueue_style(
            $this->pluginName,
            KNK_GENERATOR_PLUGIN_URL.'build/admin.css',
            [],
            $this->version,
            'all'
        );
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueueScripts()
    {
        wp_enqueue_script(
            $this->pluginName,
            KNK_GENERATOR_PLUGIN_URL.'build/admin.js',
            [],
            $this->version,
            false
        );
    }
}
