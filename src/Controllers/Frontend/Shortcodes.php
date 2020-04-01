<?php

namespace KnkGenerator\Controllers\Frontend;

use KnkGenerator\Controllers\AbstractController;

class Shortcodes extends AbstractController
{
    public function addShortcodes()
    {
        add_shortcode('knk-generator', [$this, 'renderGenerator']);
    }

    public function renderGenerator()
    {
        return $this->render(
            'shortcodes:generator.php',
            [
                'test' => 'BOOM!'
            ]
        );
    }
}
