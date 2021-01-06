<?php

class Pomidoras {
    private $count,  $ID;


 
public function __construct($lastid){
    $this-> ID = $lastid + 1;
    $this-> count =0;

    // $agurkasObj->ID = $_SESSION['agurku ID'] +1;
    // $agurkasObj->count = 0;
}



public function __get($propertyName){
    return $this->$propertyName;

}
public function __set($propertyName, $value){
    
    $this -> $propertyName = $value;

}

public function addPomidoras($pomidorai)
{
    $this->count = $this->count + $pomidorai;
}

public function nuskintiVisus()
{
    $this->count = 0;
} 
}

