<?php

/*
Exception Handling
    - This script demonstrates how to handle exceptions in PHP.
    - Parent class: Throwable
    - Child class: Exception
    - All the built-in exceptions in PHP are derived from the Exception class.
    - Custom exceptions can be created by extending the Exception class.
    - Use cases:
        - Catching and handling errors gracefully
        - Logging error messages
        - Providing user-friendly error messages
        - Implementing custom error handling logic
    - try, catch and finally blocks are used to handle exceptions.
    - try, catch and finally can return values, however, the return value of the finally block is only considered.
*/

require __DIR__.'/../vendor/autoload.php';

class Invoice{
    public function __construct() {
        echo "Invoice class instantiated" . PHP_EOL;
    }

    public function invalidAmount($amount) {
        if ($amount <= 0) {
            throw new CustomException("Invalid amount: " . $amount);
        }
    }

    public function printInvoice($message) {
        if(empty($message)) {
            throw new CustomException("Message cannot be empty");
        }
    }

    public function process(){
        throw InvoiceException::fromMessage("Processing error");
    }
}

class CustomException extends Exception {
    public function __construct($message) {
        parent::__construct($message);
    }  
}

$invoice = new Invoice();
$invoice->process();

try{
    $invoice->invalidAmount(0);
} catch (CustomException|Exception $e) {
    echo "Caught CustomException: " . $e->getMessage() . PHP_EOL;
} finally {
    echo "Finally block executed" . PHP_EOL;
}

class InvoiceException extends Exception {
    public static function fromMessage(string $message): static{
        return new static($message);
    }
}