<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use PDO;
use PDOException;

class HomeController
{
    public function index(): View
    {
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
        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        try {
            $cn = new PDO('mysql:host=pb-mysql;dbname=app_db', 'root', 'root', $options);
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        $name = 'John';
        $email = 'jane@example.com';
        $amount = 100;

        try {
            $cn->beginTransaction();

            $newUserStmt = $cn->prepare('INSERT INTO users (name, email) 
                                    VALUES (:name, :email)'
            );

            $newInvoiceStmt = $cn->prepare('INSERT INTO invoices (amount, user_id) 
                            VALUES (:amount, :user_id)'
            );;

            $newUserStmt->execute(['name' => $name, 'email' => $email]);


            $newInvoiceStmt->execute(['amount' => $amount, 'user_id' => $cn->lastInsertId()]);

            $cn->commit();
        }catch (PDOException $e) {
            if( $cn->inTransaction()){$cn->rollBack();}
        }

        $fetchStmt = $cn->prepare('SELECT invoices.id AS invoice_id, amount, 
                        name FROM invoices 
                       INNER JOIN users 
                       ON invoices.user_id = users.id
                        WHERE email = :email');

        $fetchStmt->execute(['email' => $email]);
        $invoices = $fetchStmt->fetchAll();
        echo '<pre>';
        print_r($invoices);
        echo '</pre>';
        return View::make('index');
        // echo 'test home';
    }
}
