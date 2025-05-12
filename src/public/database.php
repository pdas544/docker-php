<?php

//test connection to database

// $servername  = "container-name" of the mysql container
// $servername = "localhost" does not work.
$servername = "pb-mysql";
$username = "user";         //user created in mysql
$password = "password";     //password created in mysql
$dbname = "app_db";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully\n";