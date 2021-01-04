<?php

 class Vovere extends Miskas{
      
    protected $name = 'Voveryte';
    private $type = 'Grauzikas';
    protected $voice = 'Skviki-skviki';

    public static $title = 'Voveres giria';

    public function __construct(){

    parent::__construct(); //tevo konstruktorius

    echo '<h3>VOVERES KONSTRUKTORIUS </h3>';
}

    public function makeNoise(){

    echo '<h1 style="color:red;">'.$this->voice.'</h1>';
}

    public function makeBigNoise(){
    $this->makeNoise();
    parent::makeNoise();

}

    public function getTitle(){

    return self::$title; //self nuoroda i klases varda
}
}