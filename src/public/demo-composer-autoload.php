<?php

require __DIR__.'/../vendor/autoload.php';

use App\PaymentGateway\Paddle\Transaction as PaddleTransaction;

$transaction = new PaddleTransaction();
var_dump($transaction);