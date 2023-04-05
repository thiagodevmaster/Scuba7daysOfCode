<?php

use Scuba\Controller\NotFoundController;

require_once __DIR__ . '/../vendor/autoload.php';

session_start();
session_regenerate_id();

$routes = require_once __DIR__ . "/../config/routes.php";
$path_info = $_SERVER['PATH_INFO'] ?? "/";
$http_method = $_SERVER['REQUEST_METHOD'];

$freeRoutes = [
    '/login',
    '/register',
    '/forget-password',
    '/confirm_email'
];

$isFreeRoute = in_array($path_info, $freeRoutes);

if(!array_key_exists('logged', $_SESSION) && !$isFreeRoute){
    header("Location: /login");
    return;
}

$key = "$http_method|$path_info";

if(array_key_exists($key, $routes)){
    $class_controller = $routes[$key];
    $controller = new $class_controller();
}else{
    $class_controller = NotFoundController::class;
    $controller = new $class_controller();
}

$controller->do_process_request();
