<?php

declare(strict_types=1);

class Transaction{
    public float $amount;
    public string $description;

    public function __construct(float $amount = 0.0, string $description = ''){
        $this->amount = $amount;
        $this->description = $description;
    }

    public function addTax(float $taxRate): Transaction{
        $this->amount += $this->amount * $taxRate / 100;

        return $this;
    }

    public function addDiscount(float $discount): Transaction{
        $this->amount -= $this->amount * $discount / 100;

        return $this;
    }
}