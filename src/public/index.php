<?php

require __DIR__ . '/../vendor/autoload.php';

session_start();


define('VIEW_PATH', __DIR__ . '/../Views');



use App\Router;
use App\Controllers\HomeController;
use App\Controllers\InvoiceController;

$router = new Router();

$router->get('/', [HomeController::class, 'index'])
    ->get('/invoices', [InvoiceController::class, 'index'])
    ->get('/invoices/create', [InvoiceController::class, 'create']);

//Need to echo the return value of resolve to display the view
// echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']

echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));;
