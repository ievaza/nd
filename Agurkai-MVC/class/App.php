<?php
namespace Main;

use Main\Store;
use Cucumber\Agurkas;
use Tomato\Pomidoras;
use Controllers\SodinimasController;
use Controllers\AuginimasController;
use Controllers\SkynimasController;


class App{

public static function route(){
        
    $uri = str_replace(INSTAL_FOLDER, '', $_SERVER['REQUEST_URI']);
    $uri = explode('/',$uri); //<- zodziu masyvas su duomenim is uri eilutes

     if('sodinimas' == $uri[0]) {
        if(!isset($uri[1])) { return (new SodinimasController)->index();}
        if('list' == $uri[1]) { return (new SodinimasController)->list();}
        if('remove' == $uri[1]) { return (new SodinimasController)->remove();}
        if('cucumber' == $uri[1]) { return (new SodinimasController)->plantCuc();}
        if('tomato' == $uri[1]) { return (new SodinimasController)->plantTom();}
         //gera vieta prideti 404psl, jei neatitnka nei vieno IF
    }  
    elseif('auginimas' == $uri[0]){
        if(!isset($uri[1])) {return (new AuginimasController)->index();}
        if('list' == $uri[1]) {return (new AuginimasController)->list();}
        if('grow' == $uri[1]) {return (new AuginimasController)->grow();}
    } 
    else if('skynimas' == $uri[0]){
        if(!isset($uri[1])) {return (new SkynimasController)->index();}
        if('list' == $uri[1]) {return (new SkynimasController)->list();}
        if('harvestOne' == $uri[1]) {return (new SkynimasController)->harvestOne();}
        if('harvestCount' == $uri[1]) {return (new SkynimasController)->harvestCount();}
        if('harvestAll' == $uri[1]) {return (new SkynimasController)->harvestAll();}
    }
}

    public static function redirect($where){
        header('Location:'.URL.$where);
        exit;
    }

    public static function currency($DATA) {
    $answer = $DATA->get();

    if( $answer === false){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,
    'https://api.exchangeratesapi.io/latest');
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); //norint kazka gaut reikia nepamirsti pasireturnint, kitaip nieko negausim. MUST HAVE

    $answer = curl_exec($ch);//siunciame tuo adresu(16) uzklausa ir laukiam atsakymo
    $answer = json_decode($answer); //issikoduojam ir gaunam standartini json obj 
    $DATA->set($answer);
    }
    $rate = $answer->rates->USD;
    return $rate;    
    }
}