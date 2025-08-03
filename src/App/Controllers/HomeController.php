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
use App\View;
use PDOException;

class HomeController
{
    public function index(): View
    {

       $db = App::getDb();


            $name = 'Tes';
            $email = 'tes@example.com';
            $amount = 100;

            try {
                $db->beginTransaction();

                $newUserStmt = $db->prepare('INSERT INTO users (name, email)
                                    VALUES (:name, :email)'
                );

                $newInvoiceStmt = $db->prepare('INSERT INTO invoices (user_id,amount)
                            VALUES (:user_id, :amount)'
                );;

                $newUserStmt->execute(['name' => $name, 'email' => $email]);


                $newInvoiceStmt->execute(['amount' => $amount, 'user_id' => $db->lastInsertId()]);

                $db->commit();
            } catch (PDOException $e) {
                if ($db->inTransaction()) {
                    $db->rollBack();
                }
            }

            $fetchStmt = $db->prepare('SELECT invoices.id AS invoice_id, amount,
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

        }

}
