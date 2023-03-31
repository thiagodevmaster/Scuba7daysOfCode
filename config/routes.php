<?php
// $page = ($_GET['page']??'login').'.view';
// $content = file_get_contents(VIEW_FOLDER.$page);
// echo $content;

use Scuba\Controller\DoLoginController;
use Scuba\Controller\DoRegisterController;
use Scuba\Controller\ForgetPasswordFormController;
use Scuba\Controller\LoginFormController;
use Scuba\Controller\RegisterformController;

return [
    'GET|/login' => LoginFormController::class,
    'GET|/register' => RegisterformController::class,
    'GET|/forget-password' => ForgetPasswordFormController::class,
    'POST|/register' => DoRegisterController::class,
    'POST|/login' => DoLoginController::class,
];