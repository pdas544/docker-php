<?php

/**
 *  demo-anonymous-class.php
 * * This script demonstrates the use of an anonymous class in PHP.
 * *  Anonymous classes are useful for creating one-off objects without the need to define a full class.
 * 
 * Use cases:
 * - Quick prototyping
 * - Creating objects for testing purposes
 * - Implementing interfaces or extending classes without the need for a named class
 * - Encapsulating functionality without polluting the global namespace
 * * Note: Anonymous classes are available in PHP 7.0 and later.
 * 
*/

require __DIR__.'/../vendor/autoload.php';

$obj = new class {
    public function __construct() {
        echo "Anonymous class instantiated" . PHP_EOL;
    }

    public function __toString() {
        return "Anonymous class as string" . PHP_EOL;
    }
};

var_dump($obj);