<?php
namespace Cucumber;

use Veggies\Darzove;

class Agurkas extends Darzove {
    private $count,  $id, $prieaugis;

public function __construct($lastid){
    $this-> id = $lastid + 1;
    $this-> count =0;
  

    // $agurkasObj->id = $_SESSION['agurku id'] +1;
    // $agurkasObj->count = 0;
}

public function __get($propertyName){
    return $this->$propertyName;

}
public function __set($propertyName, $value){
    
    $this -> $propertyName = $value;

}

     public function add($kiek)
{
    $this->count = $this->count + $kiek;
}

}

