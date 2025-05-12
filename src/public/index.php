<?php

require_once '../Transaction.php';

// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";

$transaction = new Transaction(100,'Transaction 1');

//method chaining, when the called method returns the same object
$transaction->addTax(20)->addDiscount(10);

var_dump($transaction->amount);

echo "<br>";

//using stdClass
$stdClass = new stdClass();
$stdClass->amount = 100;
var_dump($stdClass);