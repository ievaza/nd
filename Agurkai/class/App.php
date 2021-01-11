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
    
}