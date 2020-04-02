<?php

namespace KnkGenerator\Controllers;

use KnkGenerator\Exceptions;

abstract class AbstractController
{

    /**
     * The ID of this plugin.
     *
     * @var      string    $pluginName    The ID of this plugin.
     */
    protected $pluginName;

    /**
     * The version of this plugin.
     *
     * @var      string    $version    The current version of this plugin.
     */
    protected $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param      string    $pluginName       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($pluginName, $version)
    {
        $this->pluginName = $pluginName;
        $this->version = $version;
    }

    /**
     * Down and dirty renderer. Loads views from src/Resources/views/
     *
     * @var string $template       In the Symfony style like "shortcodes:generator.php"
     * @var ?array $templateData   An associative array of data to make available to the template
     */
    protected function render(string $template, ?array $templateData = []): string
    {
        list($folder, $filename) = explode(':', $template);
        $filename = KNK_GENERATOR_PLUGIN_FOLDER . '/src/Resources/views/' . $folder . '/' . $filename;

        if (!file_exists($filename)) {
            throw new Exceptions\TemplateException(sprintf('Template %s not found.', $filename));
        }

        if ($templateData) {
            foreach ($templateData as $key => $value) {
                $$key = $value;
            }
        }

        ob_start();
        include $filename;
        return ob_get_clean();
    }
}
