<?php

declare(strict_types=1);

namespace tests\Unit\Services;
use App\Services\EmailService;
use App\Services\InvoiceService;
use App\Services\PaymentGatewayService;
use App\Services\SalesTaxService;
use PHPUnit\Framework\TestCase;

class InvoiceServiceTest extends TestCase{

    protected $invoiceService;
    protected $salesTaxServiceMock;
    protected $paymentGatewayServiceMock;
    protected $emailServiceMock;
    public function setUp(): void{
        /**
         * MOCKS:
         * WHAT: use to create fake objects which can initiate method calls. these fake objects are known as stubs.
         * WHY: in a real-world scenario, we cannot call gateway or email service every time, hence using mocks
         * HOW: createMock([class-name]) method
         *
         * by-default the method calls by the stubs return NULL
         */
        //creating mocks
        $this->salesTaxServiceMock = $this->createMock(SalesTaxService::class);
        $this->paymentGatewayServiceMock = $this->createMock(PaymentGatewayService::class);
        $this->emailServiceMock = $this->createMock(EmailService::class);

        /**
         * as method calls by the stubs return NULL
         * we must tell the mock object of the payment gateway service class
         * that it should return true to process the invoice
         */
        $this->paymentGatewayServiceMock->method('charge')->willReturn(true);

    }

    #[Test]
    public function testInvoices(){

        //given the invoice service class
        $this->invoiceService = new InvoiceService($this->salesTaxServiceMock,
            $this->paymentGatewayServiceMock,
            $this->emailServiceMock);
        //when the process is called

        $customer = [
            'name' => 'John Doe',
        ];
        $amount = 100;
        $result = $this->invoiceService->process($customer, $amount);

        //then assert that the invoice is processed successfully
        $this->assertTrue($result);
    }

    //test to check the email sending service
    #[Test]
    public function testEmailService(){

        //given customer data and type of invoice
        $customer = [
            'name' => 'John Doe',
        ];

        //when the email service is called, check it is called once
        $this->emailServiceMock->expects($this->once())
                                ->method('send')
                                ->with($customer,'receipt');

        //given the invoice service class
        $this->invoiceService = new InvoiceService($this->salesTaxServiceMock,
            $this->paymentGatewayServiceMock,
            $this->emailServiceMock);
        //when the process is called


        $amount = 100;
        $result = $this->invoiceService->process($customer, $amount);

        //then assert that the invoice is processed successfully
        $this->assertTrue($result);
    }

}
