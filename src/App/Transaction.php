<?php

declare(strict_types=1);

namespace App;


class Transaction{
    private const STATUS_PENDING = 'pending';
    public float $amount;
    public string $description;

    public function __construct(float $amount = 0.0, string $description = ''){
        $this->amount = $amount;
        $this->description = $description;
        var_dump(Transaction::STATUS_PENDING);  //access private constant like this 
        //or using getter method
        // echo $this->getStatus();
        var_dump(self::STATUS_PENDING); //access private constant like this
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