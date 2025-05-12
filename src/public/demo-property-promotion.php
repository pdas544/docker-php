<?php

class Animal
{
    // Property promotion in constructor available in PHP 8.0
    // This feature allows you to declare properties directly in the constructor parameters
    public function __construct(
        public string $name,
        public string $species,
        public int $age
    ) {
    }
}

$animal = new Animal('Leo', 'Lion', 5);
$animal->name = 'Leo';  // Accessing the name property
$animal->species = 'Lion';  // Accessing the species property
$animal->age = 5;  // Accessing the age property

var_dump($animal);  // Output: string(3) "Leo"