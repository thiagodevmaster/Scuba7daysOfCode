<?php

use Scuba\Controller\NotFoundController;

require_once __DIR__ . '/../vendor/autoload.php';

$routes = require_once __DIR__ . "/../config/routes.php";
$path_info = $_SERVER['PATH_INFO'];
$http_method = $_SERVER['REQUEST_METHOD'];

$key = "$http_method|$path_info";

if(array_key_exists($key, $routes)){
    $class_controller = $routes[$key];
    $controller = new $class_controller();
}else{
    $class_controller = NotFoundController::class;
    $controller = new $class_controller();
}

$controller->do_process_request();