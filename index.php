<?php

require './vendor/autoload.php';
require './src/helpers.php';

use App\Router\Router;
use App\Http\Controllers\HomeController;

$router = new Router();

$router->get('home', [HomeController::class, 'index']);
$router->post('store', [HomeController::class, 'store']);

$router->run();
