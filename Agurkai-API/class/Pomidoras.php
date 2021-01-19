<?php
namespace Tomato;

use Veggies\Darzove;

class Pomidoras extends Darzove{
    private $count,  $id, $name, $price;


 
public function __construct($lastid){
    $this->id = $lastid + 1;
    $this->count = 0;
    $this->name = 'Pomidoras';
    $this->kiekAugti = rand(1,3);
    $this->price = 2.50;

}

public function __get($propertyName){
    return $this->$propertyName;

}
public function __set($propertyName, $value){
    
    $this -> $propertyName = $value;

}
 public function kiekAugti() {
     $this->kiekAugti = rand(1,3);
        return  $this->kiekAugti ;
    }

}

