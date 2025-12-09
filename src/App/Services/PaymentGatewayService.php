<?php

namespace App\Services;

class PaymentGatewayService
{

    public function __construct()
    {
    }

    public function charge($customer, float $amount): bool{

        sleep(1);
        return (bool) mt_rand(0, 1);
    }
}