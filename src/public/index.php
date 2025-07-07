<?php


require __DIR__ . '/../vendor/autoload.php';

use App\Router;
use App\Controllers\HomeController;

$router = new Router();

$router->register('/', [HomeController::class, 'index']);

$router->resolve($_SERVER['REQUEST_URI']);
