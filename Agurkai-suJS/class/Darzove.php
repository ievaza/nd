<?php 
namespace Veggies;


abstract class Darzove {

public function add($kiek)
{
    $this->count = $this->count + $kiek;
}

public function nuskintiVisus()
{
    $this->kiekis = 0;
} 
abstract public function kiekAugti();

}