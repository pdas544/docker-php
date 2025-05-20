<?php

require __DIR__.'/../vendor/autoload.php';

use App\Toaster;



$toast = new Toaster();
$toast->addSlice('Slice 1');
$toast->addSlice('Slice 2');
$toast->addSlice('Slice 3');
$toast->toast();

$newToast = new \App\ToasterPro();
$newToast->addSlice('Slice 5');
$newToast->addSlice('Slice 6');

$newToast->toast();
$newToast->toastBagle();

