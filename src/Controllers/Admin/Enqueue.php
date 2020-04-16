<?php

namespace KnkGenerator\Controllers\Admin;

use KnkGenerator\Controllers\AbstractController;

class Enqueue extends AbstractController
{
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
