<?php

require __DIR__.'/../vendor/autoload.php';

#use uuid package
$id =  new Ramsey\Uuid\UuidFactory();

echo $id->uuid4();