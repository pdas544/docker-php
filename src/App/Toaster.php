<?php

declare(strict_types=1);

namespace App;
//implement a toaster class

//base class
class Toaster{
    protected int $size=2;
    public array $slices = [];

    public function addSlice(string $slice): void{
        if(count($this->slices) < $this->size){
            $this->slices[] = $slice;
        }
    }

    public function toast(){
        foreach($this->slices as $i => $slice){
            echo ($i + 1) , ': Toasting, ' . $slice. PHP_EOL;
        }
    }
}

class ToasterPro extends Toaster{
    public int $size = 4;
    public function toastBagle(){
        foreach($this->slices as $i => $slice){
            echo ($i + 1) , ': Toasting' . $slice.' with bagle option'. PHP_EOL;
        }
    }
}