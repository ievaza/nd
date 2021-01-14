<?php
namespace Main;

use Cucumber\Agurkas;
use Tomato\Pomidoras;
//klase atsakinga uz irasyma ir skaityma is failo

class Store{

    private const PATH = DIR.'/data/';//kelias i ta vieta kur gules json failas. GLobalo konstanta, kuria susikurem

    private $fileName = 'sodas';
    private $data;

     
    public function __construct($file){

        $this->fileName = $file;
        if(!file_exists(self::PATH.$this->fileName.'.json')){
            file_put_contents(self::PATH.$this->fileName.'.json', json_encode(['agurkas' => [], 'ID' => 0 ]));// sukuriam json faila su pradiniu masyvu
            $this->data = ['agurkas' => [], 'ID' => 0 ];
        } else{
            $this->data = file_get_contents(self::PATH.$this->fileName.'.json'); //nuskaitom faila
            $this->data = json_decode ($this->data, 1); //paverciam masyvu
        }

    }

    public function __destruct(){
// po visu keitimu construktoiuje viska destructorius uzsaukos 

            file_put_contents(self::PATH.$this->fileName.'.json', json_encode($this->data));// sukuriam json faila su tusciu masyvu
    }

    public function getData(){

        return $this->data;
    }
    public function setData($data){
        $this->data = $data;
    }

    public function getNewId(){
        $id = $this->data['ID'];
        $this->data['ID']++;
        return $id;

    }

     public function save($index, $darzove){

        $darzove= serialize($darzove);
        $this->data['agurkas'][$index]=$darzove;

    }
    
    public function addNew ( Agurkas $agurkasObj){
       
        $this ->data['agurkas'][]=serialize($agurkasObj);

    }
      
    public function addNewPom ( Pomidoras $pomObj){

        $this ->data['agurkas'][]=serialize($pomObj);
       
    }

    public function  getAll ( ){
        $all = [];
        foreach ($this ->data['agurkas'] as $agurkas){
            $all[] = unserialize($agurkas);
        }
        return $all;
        
    }

public function remove($id) {
    foreach ($this->data['agurkas'] as $key => $darzove) {
        $darzove = unserialize($darzove);
          if($darzove->ID == $id) {
            unset($this->data['agurkas'][$key]);
        }
    }
}
    public  function auginti(){
        foreach($this->data['agurkas'] as $index => $darzove) { //<--stringas serializuotas
            $darzove = unserialize($darzove); //<-- agurko objektas
            $darzove-> add($_POST['kiekis'][$darzove->ID]); //<- pridedam agurka
            self::save($index, $darzove);

            // $darzove = serialize($darzove); //<-- vel stringas
            // $_SESSION['darzove'][$index]=$darzove; //<- uzsaugom agurkus, jei & parasytume, tai nereiketu sitos eilutes, bet kituose projektuose ilgesni varianta naudosim SITA
        }
    }

    public  function nuimtiDerliu(){ // $visiAgurkai = &$_SESSION['obj']

    foreach($this->data['agurkas'] as $index => $darzove){
                $darzove = unserialize($darzove);
                $darzove-> nuskintiVisus();
                self::save($index,$darzove);
            }
    }

    
    public function skinti(){
    foreach($this->data['agurkas'] as $index => $darzove ) {
        $darzove = unserialize($darzove);
    if ($_POST['israuti'] == $darzove->ID){
        $darzove->count = 0;
        self::save($index,$darzove);
    }
    }
}

 public  function skintiKieki(){
        foreach($this->data['agurkas'] as $index=>$darzove) {
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
        }
        }    
    }

}