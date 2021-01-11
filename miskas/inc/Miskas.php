<?php

class Miskas{

    protected $name = 'Gyvulys';
    private $area = 1000; //private nepaveldima, lieka ten kur pakrikstinom. kiti nemato private
    protected $animals = 0;

    public static $title = 'Misko Giria';


    public function __construct(){
    echo '<h3> MISKO KONSTRUKTORIUS </h3>';
    }

    public function makeNoise(){
    echo '<h1>'.$this->voice.'</h1>';
    }

    public function getArea(){
    return $this->area;
    }

    public function getTitle(){
    return self::$title; //self nuoroda i klases varda
    }
    
    public static function getSelfName() {
        return self::$title;
    }

    public static function getStaticName() {
        return static::$title;
    }

}