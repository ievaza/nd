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


    // public static function session(){
    //     if (!isset($_SESSION['darzove'])) {
    //     $_SESSION['darzove'] = []; 
    //     $_SESSION['ID']=0;
    //     }
    // }

    public static function redirect($where){
        header('Location:'.URL.$where);
        exit;
    }
    
    public static function save($index, $darzove){

        $darzove= serialize($darzove);
        $_SESSION['darzove'][$index]=$darzove;

    }

    public static function sodinti(){
     if ($_POST['sodinti']=="agurkas") {

        $agurkasObj = new Agurkas($store -> getNewId());
        $store->addNewAgurkas( $agurkasObj);

        // $_SESSION['darzove'][]= serialize($agurkasObj);
        // $_SESSION['ID']++;
   
        } elseif ($_POST['sodinti']=="pomidoras") {
    
        $pomObj = new Pomidoras($store -> getNewId());
        $store->addNewPom( $pomObj);


        // $_SESSION['darzove'][]= serialize($pomObj);
        // $_SESSION['ID']++;

        }
    }

    // public static function rauti(){
    //     foreach(Sodas\Store::getAll() as $darzove) {
    //         // $darzove = unserialize($darzove);
    //     if ($_POST['rauti'] == $darzove->ID) {
    //         unset($_SESSION['darzove'][$index]);}
    //     }
    // }

    public static function auginti(){
        foreach($_SESSION['darzove'] as $index => $darzove) { //<--stringas serializuotas
            $darzove = unserialize($darzove); //<-- agurko objektas
            $darzove-> add($_POST['kiekis'][$darzove->ID]); //<- pridedam agurka
            self::save($index, $darzove);

            // $darzove = serialize($darzove); //<-- vel stringas
            // $_SESSION['darzove'][$index]=$darzove; //<- uzsaugom agurkus, jei & parasytume, tai nereiketu sitos eilutes, bet kituose projektuose ilgesni varianta naudosim SITA
        }
    }

    public static function skintiKieki(){
        foreach($_SESSION['darzove'] as $index=>$darzove) {
            $darzove = unserialize($darzove);
        if ($_POST['skinti'] == $darzove->ID){
            $kiekis = (int) $_POST['kiek'];
        if ($kiekis < 0 || $kiekis > $darzove->count){
            $_SESSION['err'] = 'Blogas kiekis';
            header('Location: http://localhost/PHP/nd/Agurkai/skynimas.php');
            exit;
            }
                $darzove->count -= $kiekis;
                self::save($index, $darzove);  
                // $darzove= serialize($darzove);
                // $_SESSION['darzove'][$index]=$darzove;
        }
        }    
    }

    public static function skinti(){
    foreach($_SESSION['darzove'] as $index => $darzove ) {
        $darzove = unserialize($darzove);
    if ($_POST['israuti'] == $darzove->ID){
        $darzove->count = 0;
        $darzove = serialize($darzove);
        $_SESSION['darzove'][$index]=$darzove;}
    }
}
public static function nuimtiDerliu(){ // $visiAgurkai = &$_SESSION['obj']

    foreach($_SESSION['darzove'] as $index => $darzove){
                $darzove = unserialize($darzove);
                $darzove-> nuskintiVisus();
                $darzove = serialize($darzove);
                $_SESSION['darzove'][$index]=$darzove;
            }
    }
}