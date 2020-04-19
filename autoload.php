<?php

spl_autoload_register(function (string $className) {
    if (strpos($className, MODERN_WP_PLUGIN_BOILERPLATE_NAMESPACE) !== 0) {
        return;
    }

    $pathParts = explode('\\', $className);
    $pathParts[0] = 'src';
    
    include MODERN_WP_PLUGIN_BOILERPLATE_PLUGIN_FOLDER . '/' . implode('/', $pathParts) . '.php';
});
