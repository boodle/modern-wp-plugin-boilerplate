<?php

namespace ModernWpPluginBoilerplate\Controllers\Frontend;

use ModernWpPluginBoilerplate\Controllers\AbstractController;

class Shortcodes extends AbstractController
{
    public function addShortcodes()
    {
        add_shortcode('modern-wp-plugin-boilerplate', [$this, 'renderGenerator']);
    }

    public function renderGenerator()
    {
        return $this->render('shortcodes:generator.php');
    }
}
