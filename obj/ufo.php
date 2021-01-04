<?php 

class Nso {
 public $ufoCount  =2;
 protected $color = 'Black';
 private $tail = false;

 public function addOneMoreUfo(){

    $this->ufoCount++;
 }
  public function addMoreUfo($ufoCount){

    $this->ufoCount + $ufoCount;
 }

 public funtion removeMoreUfo($ufo){
     $this-> ufoCount = this->ufoCount + $ufo;
 }



}

//Gamyba 


$ufo1 = new Nso(); //<-- pagaminam ufo1
$ufo2 = new Nso;
$ufo3 = new Nso;

//Tyrimas
echo '<pre>';
var_dump($ufo1);
var_dump($ufo2);
var_dump($ufo3);


echo $ufo1->ufoCount; // tarp objekto ir savybes turim rodykle, savybe be $ priekyje, jei su $ veiks kitaip. Nera nesa savybe ner kintamsis, pati is saves viena negali egzistuoti, nesavarankis, ir totaliai priklausoma nuo objekot
// su protected nei privite savybiu negalime pasiekt
$ufo1->addOneMoreUfo();
$ufo1->addOneMoreUfo();
$ufo1->addOneMoreUfo();
$ufo1->addMoreUfo(14);
echo $ufo1->ufoCount;
