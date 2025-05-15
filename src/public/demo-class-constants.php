<?php

require __DIR__.'/../vendor/autoload.php';

use App\Transaction;

//access the constant property of class Transaction

// echo Transaction::STATUS_PENDING;        //works when property is public

//private constant property can be accessed using the class name or self keyword

$transaction = new Transaction(100,'Transaction 1');