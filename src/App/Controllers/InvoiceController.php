<?php

namespace App\Controllers;

use App\View;

class InvoiceController
{

    public function index(): View
    {
        // Logic to fetch and display invoices
        return View::make('invoices/index');
    }

    public function create(): View
    {
        // Logic to create a new invoice
        return View::make('invoices/create');
    }
}
