<?php

declare (strict_types=1);

namespace App\Services;

use PharIo\Manifest\Email;

class InvoiceService{
    public function __construct(
        protected SalesTaxService $salesTaxService,
        protected PaymentGatewayService $paymentGatewayService,
        protected EmailService $emailService)
    {
    }

    public function process(array $customer, float $amount): bool
    {

        //1. calculate sales tax
        $tax = $this->salesTaxService->calculate($customer, $amount);

        //2.process payment and invoice
        if(!$this->paymentGatewayService->charge($customer, $amount)){
            return false;
        }

        //3.use email service to send email
        $this->emailService->send($customer,'receipt');
        return true;
    }
}
