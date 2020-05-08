<?php
spl_autoload_register(function ($class_name) {
    if (!file_exists('Class/'.$class_name . '.php')){
        exit("in Class non-existent:" . $class_name . '.php');
    }
    require_once 'Class/'.$class_name . '.php';
});
require_once "function.php";