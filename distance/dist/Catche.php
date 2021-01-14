<?php 

class Catche {

    private $data;
    private $catchTime = 10;

    public function __construct(){
        if(file_exists(__DIR__.'/data.json')){

           $this->data = json_decode(file_get_contents(__DIR__.'/data.json'));

        }
    }

    public function get(){ //turi grazinti duomenis paiimtu is chash arba sakyti kad cash nebevalidus ir darykit nauja
        if ( null === $this->data ){
            return false; // getui reiks tai, kad duomenu neturiu pasiimk pats is kur nori
        }
        if ($this->data->timeStamp + $this->$catchTime <= time()){
            return false; 

        }
        return $this->data;

    }

    public function set( object $data){ //siunciame duomenis kazkokius ir norime, kad tai butu obj 
        //obj pridedam savybe time
        $data->timeStamp = time();
        file_get_contents(__DIR__.'/data.json',json_encode($data)); // ir idedam sujsonintus duomenis

    }
}