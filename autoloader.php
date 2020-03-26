<?php

spl_autoload_register(function ($class_name) {
    print_r($class_name);
    exit();
    //include $class_name . '.php';
});