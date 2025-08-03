<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

//session_start();


define('VIEW_PATH', __DIR__ . '/../Views');


use App\App;
use App\Router;
use App\Controllers\HomeController;
use App\Controllers\InvoiceController;
use App\Config;

$router = new Router();


    $router->get('/', [HomeController::class, 'index'])
        ->get('/invoices', [InvoiceController::class, 'index'])
        ->get('/invoices/create', [InvoiceController::class, 'create']);

    //Need to echo the return value of resolve to display the view
    // echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']


(new App($router, ['uri'=> $_SERVER['REQUEST_URI'],'method'=> strtolower($_SERVER['REQUEST_METHOD'])], new Config($_ENV)))->run();
