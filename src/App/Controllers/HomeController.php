<?php

/***
 * host: pb-mysql : name of the mysql container
 * named parameters: not positional and order does not matter
 *
 * difference between bindValue() and bindParam()
 * bindValue(placeholder, value): the value cannot be changed once supplied. value can be direct literal
 * for eg:
 * bindValue(':id',$id) OR bindValue(':id',1)
 * statement 1;
 * statement 2;
 * $id = 2;      -- no effect in bindValue() method
 *
 * bindParam(placeholder, value): the value cannot be a literal. the value is passed as reference and can be changed at runtime.
 * for eg:
 * bindParam(':id', $id);
 * statement 1;
 * statement 2;
 * $id = 2; -- value of $id is changed before executing the statement.
 */

declare(strict_types=1);

namespace App\Controllers;

use App\App;
use App\Models\Invoice;
use App\Models\SignUp;
use App\Models\User;
use App\View;
use PDOException;

class HomeController
{
    public function index(): View
    {

            $name = 'Eva';
            $email = 'Eva@example.com';
            $amount = 350;

            $userModel = new User();
            $invoiceModel = new Invoice();

        $invoiceId = (new SignUp($userModel, $invoiceModel))->register(
            [
                'name' => $name,
                'email' => $email,
            ],
            [
                'amount' => $amount,

            ]
        );


        return View::make('index',['invoice'=> $invoiceModel->find($invoiceId)]);

        }

}
