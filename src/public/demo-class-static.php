<?php

require __DIR__.'/../vendor/autoload.php';

use App\Transaction;

//static properties are accessed using the class name
// and not tied to the instance of the class
// can be accessed using self keyword as well.

// this below statement will not work when static property is private
// echo "Transaction Count: " . Transaction::getTransactionCount();

// Use cases for static properties
// 1. To keep track of the number of instances created from a class


$tran1  = new Transaction(100,'Transaction 1');
$tran2  = new Transaction(200,'Transaction 2');
$tran3  = new Transaction(300,'Transaction 3');

echo "Transaction Count: " . Transaction::getTransactionCount(); //3

