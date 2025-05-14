<?php

/*
Autoload using spl_autoload_register() function:
- This function allows you to register multiple autoload functions.
- It will call each registered function in the order they were registered until one of them returns a value.
- This is useful for loading classes from different namespaces or directories.
*/
//autoload function

spl_autoload_register(function ($class) {
    // Convert the namespace to a file path
    $path = __DIR__.'/../'. str_replace('\\', '/', $class) . '.php';

    require $path;
    // var_dump($path);
});

use App\PaymentGateway\Paddle\Transaction as PaddleTransaction;

$transaction  = new PaddleTransaction();

var_dump($transaction);