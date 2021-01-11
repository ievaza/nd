<?php
namespace Tomato;

use Veggies\Darzove;

class Pomidoras extends Darzove{
    private $count,  $ID;


 
public function __construct($lastid){
    $this-> ID = $lastid + 1;
    $this-> count =0;
}

public function __get($propertyName){
    return $this->$propertyName;

}
public function __set($propertyName, $value){
    
    $this -> $propertyName = $value;

}




}

