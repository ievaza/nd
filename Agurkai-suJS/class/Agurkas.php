<?php
namespace Cucumber;

use Veggies\Darzove;

class Agurkas extends Darzove {
    private $count,  $id, $name;

public function __construct($lastid){
    $this->id = $lastid + 1;
    $this->count = 0;
    $this->name = 'Agurkas';
    $this->kiekAugti = rand(2,9);
  
  

    // $agurkasObj->id = $_SESSION['agurku id'] +1;
    // $agurkasObj->count = 0;
}

public function __get($propertyName){
    return $this->$propertyName;

}
public function __set($propertyName, $value){
    
    $this -> $propertyName = $value;

}

 public function kiekAugti() {
     $this->kiekAugti = rand(2,9);
        return  $this->kiekAugti ;
    }
}

