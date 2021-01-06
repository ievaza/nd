<?php

class Agurkas {
    private $count,  $ID;


    // public static function nuimtiDerliu($visiAgurkai){ // $visiAgurkai = &$_SESSION['obj']

    //         foreach($visiAgurkai as $index => $agurkas){
    //             $agurkas = unserialize($agurkas);
    //             $agurkas-> nuskintiVisus();
    //             $agurkas = serialize($agurkas);
    //             $visiAgurkai[$index]=$agurkas;
    //         }
    //         return $visiAgurkai;
    // }

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

public function addAgurkas($agurkai)
{
    $this->count = $this->count + $agurkai;
}

public function nuskintiVisus()
{
    $this->count = 0;
} 
}

