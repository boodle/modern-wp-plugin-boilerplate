<?php

namespace KnkGenerator\Controllers\Frontend;

use KnkGenerator\Controllers\AbstractController;

class FrontendEnqueue extends AbstractController
{
    public function enqueueStyles()
    {
        wp_enqueue_style(
            $this->pluginName,
            KNK_GENERATOR_PLUGIN_URL.'build/public.css',
            [],
            $this->version,
            'all'
        );
    }

    public function enqueueScripts()
    {
        wp_enqueue_script(
            $this->pluginName,
            KNK_GENERATOR_PLUGIN_URL.'build/public.js',
            [],
            $this->version,
            false
        );
    }
}
