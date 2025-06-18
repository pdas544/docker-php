<?php
namespace App;


/**
 * We can use IteratorAggregate interface or Iterator interface to iterate over a collection of objects.
 * Iterator interface can be cumbersome to implement, so we will use IteratorAggregate interface as the invoices are stored in an array.
 * However, if we need more control over the iteration process, we can implement the Iterator interface.
 * 
 */
class InvoiceCollection implements \IteratorAggregate
{
   public function __construct(public array $invoices)
   {
    
   }

   //implementing the IteratorAggregate interface
   public function getIterator(): \Iterator
   {
       return new \ArrayIterator($this->invoices);
   }
   
}