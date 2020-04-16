<?php

namespace KnkGenerator\Controllers\Admin;

use KnkGenerator\Controllers\AbstractController;

class SettingsPage extends AbstractController
{
    public function registerPage()
    {
        // reference https://developer.wordpress.org/reference/functions/add_options_page/
        add_options_page(
            'Settings Admin',                   // page title
            'My Settings',                      // menu title
            'manage_options',                   // capability required to access / see it
            KNK_GENERATOR_NAME.'settings-page', // slug (needs to be unique)
            [$this, 'renderPage']               // callable function to render the page
        );
    }

    public function registerSettings()
    {
        // This created the option in the wp_option table
        // reference https://developer.wordpress.org/reference/functions/add_option/
        add_option(KNK_GENERATOR_NAME.'_id_number');
        add_option(KNK_GENERATOR_NAME.'_title');

        // This marks them as a setting you can edit in the admin
        // reference https://developer.wordpress.org/reference/functions/register_setting/
        register_setting(
            KNK_GENERATOR_NAME.'_options',      // Option group; Default whitelisted option listed on URL above
            KNK_GENERATOR_NAME.'_id_number',    // ID
            [
                'type' => 'number',
                'description' => 'Example ID',
                'sanitize_callback' => 'sanitize_text_field',    // sanitise callback
                'show_in_rest' => false,
                'default' => ''
            ]
        );

        register_setting(
            KNK_GENERATOR_NAME.'_options',      // Option group; Default whitelisted option listed on URL above
            KNK_GENERATOR_NAME.'_title',        // ID
            [
                'type' => 'string',
                'description' => 'Example title',
                'sanitize_callback' => 'sanitize_text_field',    // sanitise callback
                'show_in_rest' => true,
                'default' => ''
            ]
        );

        // Adds the settings *section*
        add_settings_section(
            KNK_GENERATOR_NAME.'_options_section',  // Unique ID for the section
            'Section Title',                        // Title for the section
            [$this, 'renderSectionIntro'],          // Callable function to echo the intro
            KNK_GENERATOR_NAME.'settings-page'      // the page this section appears on (defined in registerPage above)
        );

        // This adds the html field that renders the setting
        // reference https://developer.wordpress.org/reference/functions/add_settings_field/
        add_settings_field(
            KNK_GENERATOR_NAME.'_id_number',        // id="" value
            'Example ID number',                    // <label> vale
            [$this, 'renderField'],                 // callback to actually do the rendering of the input
            KNK_GENERATOR_NAME.'settings-page',     // Slug of the page to show this on (defined in registerPage above)
            KNK_GENERATOR_NAME.'_options_section',  // slug of the sction the field appears in
            [                                       // array of values to pass to the render callback
                'id' => KNK_GENERATOR_NAME.'_id_number',
                'type' => 'number',
            ]
        );

        add_settings_field(
            KNK_GENERATOR_NAME.'_title',            // id="" value
            'Example Title',                        // <label> vale
            [$this, 'renderField'],                 // callback to actually do the rendering of the input
            KNK_GENERATOR_NAME.'settings-page',     // Slug of the page to show this on (defined in registerPage above)
            KNK_GENERATOR_NAME.'_options_section',  // slug of the sction the field appears in
            [                                       // array of values to pass to the render callback
                'id' => KNK_GENERATOR_NAME.'_title',
                'type' => 'text',
            ]
        );
    }

    public function renderSectionIntro()
    {
        echo __('Enter your settings below:', KNK_GENERATOR_NAME);
    }

    public function renderField($fieldParameters)
    {
        echo $this->render(
            'forms:fields/'.$fieldParameters['type'].'.php',
            [
                'id' => $fieldParameters['id'],
                'name' => $fieldParameters['id'],
                'value' => get_option($fieldParameters['id'])
            ]
        );
    }

    public function renderPage()
    {
        echo $this->render('forms:settingsPage.php');
    }
}
