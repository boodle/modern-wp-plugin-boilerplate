<div class="wrap">
    <h1>My Settings</h1>
    <form method="post" action="options.php">
        <?php
            settings_fields(MODERN_WP_PLUGIN_BOILERPLATE_NAME.'_options');
            do_settings_sections(MODERN_WP_PLUGIN_BOILERPLATE_NAME.'settings-page');
            submit_button();
        ?>
    </form>
</div>