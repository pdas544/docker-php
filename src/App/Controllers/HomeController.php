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
         */
        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        try {
            $cn = new PDO('mysql:host=pb-mysql;dbname=app_db', 'root', 'root', $options);

            $query = 'SELECT * FROM users WHERE id = :id';
            $stmt = $cn->prepare($query);
            $stmt->bindValue(':id', 1);
            $stmt->execute();
            $user = $stmt->fetch();
            var_dump($user);

//            foreach ($cn->query($query) as $row) {
//                echo '<pre>';
//                var_dump($row);
//                echo '</pre>';
//            }
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }

        return View::make('index');
        // echo 'test home';
    }
}
