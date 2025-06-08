<?php

/*
Object Serialization in PHP allows you to convert an object into a storable format, such as a string or an array.
This is useful for saving the state of an object to a file or database, or for sending it over a network.
Serialization is done using the `serialize()` function, and deserialization is done using the `unserialize()` function.
When an object is serialized, its properties and their values are stored in a string format.
When it is unserialized, a new object is created with the same properties and values as the original object.
*/
require __DIR__.'/../vendor/autoload.php';
use App\Transaction;
// Create a new Transaction object
$transaction = new Transaction(100, 'Transaction 1');
// Serialize the object
$serializedTransaction = serialize($transaction);
// Display the serialized string
echo "Serialized Transaction: $serializedTransaction". PHP_EOL;
// Unserialize the string back into an object
$unserializedTransaction = unserialize($serializedTransaction);
// Display the unserialized object properties
echo "Unserialized Transaction:  Amount = {$unserializedTransaction->amount}, Description = {$unserializedTransaction->description}". PHP_EOL;
// Check if the unserialized object is the same as the original object
if ($transaction === $unserializedTransaction) {
    echo "The unserialized transaction is the same object as the original" . PHP_EOL;
} else {
    echo "The unserialized transaction is a different object than the original.";
}