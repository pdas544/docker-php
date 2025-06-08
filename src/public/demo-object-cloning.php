<?php

/*
Objects can be cloned in PHP using the `clone` keyword.
This creates a shallow copy of the object, meaning that the new object will have the same properties as the original, but they are separate instances.

- magic method `__clone()` can be defined in the class to customize the cloning behavior.
*/

require __DIR__.'/../vendor/autoload.php';

use App\Transaction;

// Cloning an object creates a new instance with the same properties
$tran1 = new Transaction(100, 'Transaction 1');
// Display the original object
echo "Original Transaction: Amount = {$tran1->amount}, Description = {$tran1->description} <br/>";
$tran2 = clone $tran1; // Clone the object
$tran2->amount = 200; // Modify the cloned object
$tran2->description = 'Cloned Transaction 2';

// Display the cloned object
echo "Cloned Transaction: Amount = {$tran2->amount}, Description = {$tran2->description}<br/>";

// Object comparison
//equality operator (==) checks if the properties are the same
// identity operator (===) checks if they are the same object
if ($tran1 === $tran2) {
    echo "Both transactions are the same object.<br/>";
} else {
    echo "The transactions are different objects.<br/>";
}

/**
 * zend value is the internal representation of PHP variables.
 * It is a data structure that holds the value and type information of a variable.
 * When an object is cloned, a new zend value is created for the cloned object.
 * This means that the cloned object has its own separate zend value, even if it has the same properties as the original object.
 */
