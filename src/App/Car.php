<?php

/*
Magic methods in PHP
1) __get() and __set()
2) __isset() and __unset()
3) __call() and __callStatic()
4) __toString()
5) __invoke()
6) __debugInfo()
*/

declare(strict_types=1);

namespace App;


class Car{
    public $data = [];

    public function __get(string $name){
        if(array_key_exists($name,$this->data)){
            return $this->data[$name];
        }
    }

    public function __set(string $name, $value): void{
       $this->data[$name] = $value;
    }

    //called for using empty functions, undefined/inaccessible properties
    public function __isset($name): bool
    {
        var_dump('isset called: ');   

        return array_key_exists($name,$this->data);
    }

    public function __unset($name)
    {
        var_dump('unset called: '); 
        unset($this->data[$name]);
    }
}