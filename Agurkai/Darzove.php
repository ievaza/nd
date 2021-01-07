<?php 

class Darzove{

     public function add($kiek)
{
    $this->count = $this->count + $kiek;
}

public function nuskintiVisus()
{
    $this->count = 0;
} 

public static function nuimtiDerliu($visi){ // $visiAgurkai = &$_SESSION['obj']

            foreach($visi as $index => $darzove){
                $darzove = unserialize($darzove);
                $darzove-> nuskintiVisus();
                $darzove = serialize($darzove);
                $visi[$index]=$darzove;
            }
            return $visi;
    }



}