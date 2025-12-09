<?php

namespace App\Services;

class EmailService
{

    public function __construct()
    {
    }

    public function send($customer, $data): bool{
        sleep(1);
        return true;
    }
}