<?php

spl_autoload_register(function (string $className) {
    if (strpos($className, KNK_GENERATOR_NAMESPACE) !== 0) {
        return;
    }

    $pathParts = explode('\\', $className);
    $pathParts[0] = 'src';
    
    include KNK_GENERATOR_PLUGIN_FOLDER . '/' . implode('/', $pathParts) . '.php';
});
