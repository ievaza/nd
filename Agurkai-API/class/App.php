<?php
namespace Main;

use Main\Store;
use Cucumber\Agurkas;
use Tomato\Pomidoras;

class App{

    public static function route(){
        
$uri = str_replace(INSTAL_FOLDER, '', $_SERVER['REQUEST_URI']);
$uri = explode('/',$uri); //<- zodziu masyvas su duomenim is uri eilutes

     if('sodinimas' == $uri[0]) {
        include DIR.'/sodinimas.php';
    } elseif('auginimas' == $uri[0]){
        include DIR.'/auginimas.php';
    } else if('skynimas' == $uri[0]){
        include DIR.'/skynimas.php';
    }
    }

    public static function redirect($where){
        header('Location:'.URL.$where);
        exit;
    }

    public static function  currency($DATA) {
    $answer = $DATA -> get();

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,
    'https://api.exchangeratesapi.io/latest');
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); //norint kazka gaut reikia nepamirsti pasireturnint, kitaip nieko negausim. MUST HAVE

    $answer = curl_exec($ch);//siunciame tuo adresu(16) uzklausa ir laukiam atsakymo
    $answer = json_decode($answer); //issikoduojam ir gaunam standartini json obj 
    
    $DATA->set($answer);

    $rate = $answer->rates->USD;
    return $rate;
    
}}