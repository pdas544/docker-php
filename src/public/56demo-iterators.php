<?php

/**
 * This page demonstrates the use of iterators in PHP.
 * 
 * - Commonly used iterators:
 *  - ArrayIterator: For iterating over arrays.
 * - DirectoryIterator: For iterating over files in a directory.
 * * - RecursiveIterator: For iterating over nested structures.
 * 
 * Iterators allows us to iterate over complex data structures in a consistent way.
 *
 */

require __DIR__.'/../vendor/autoload.php';

use App\InvoiceCollection;
use App\Invoice;

$invoiceCollection = new InvoiceCollection([new Invoice(25),new Invoice(30),new Invoice(35)]);


//the below approach is used to iterate over the collection of invoices
//which displays only the visible properties of the Invoice object
/***
 * Here $invoice is treated as a single property.
 * However, we want to iterate over the properties of the Invoice object and not the * Invoice object itself.
 * Therefore, we need to use IteratorAggregate or Iterator interface in the InvoiceCollection class.
 * 
 * */
foreach ($invoiceCollection as $invoice) {
    echo "Invoice ID: {$invoice->id}, Amount: {$invoice->amount}\n";
}

/**
 * If we want to pass a collection of different objects, then we can use the type hinting 
 * to specify the type of the collection using pipe character and this is not recommended.
 *  However, PHP also provides a better way to handle this using the iterable type hinting.
 * 
 */
//iterable is a pseudo-type that can be used to type hint any object that can be iterated over
echo "\nPrinting invoices using iterable type hinting:\n";
function printData(iterable $iterable): void
{
    foreach ($iterable as $i => $item) {
        echo $i . PHP_EOL;
    }
}
printData($invoiceCollection);
printData([1,2,3]);