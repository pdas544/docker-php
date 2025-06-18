<?php

namespace App;

class Invoice
{
    public string $id;

    //float is a promoted property, which means it is automatically assigned to the class property with the same name
    public function __construct(public float $amount)
    {
        $this->id = uniqid('inv_', true); // Generate a unique ID for the invoice
    }

}