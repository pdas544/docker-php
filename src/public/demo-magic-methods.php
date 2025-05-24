<?php

/**
 *  demo-magic-methods.php
 * 
*/

require __DIR__.'/../vendor/autoload.php';

use App\Car;

$newCar = new Car();

$newCar->wheels = '4';

var_dump(isset($newCar->wheels));       //__isset() magic method gets called here

/***
 * __set() magic method is called automatically when dynamic property is created
 */
$newCar->amount = '399';        //amount property is create dynamically and is not available inside the Car class

echo $newCar->amount;

unset($newCar->wheels);

var_dump(isset($newCar->wheels)); 





