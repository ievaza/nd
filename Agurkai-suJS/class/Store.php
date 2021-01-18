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
            file_put_contents(self::PATH.$this->fileName.'.json', json_encode(['darzoves' => [], 'id' => 0 ]));// sukuriam json faila su pradiniu masyvu
            $this->data = ['darzoves' => [], 'id' => 0 ];
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

    public function getNewid(){
        $id = $this->data['id'];
        $this->data['id']++;
        return $id;

    }

     public function save($index, $darzove){

        $darzove= serialize($darzove);
        $this->data['darzoves'][$index]=$darzove;

    }
    
    public function addNewC ( Agurkas $agurkasObj){
       
        $this ->data['darzoves'][]=serialize($agurkasObj);

    }
      
    public function addNewT ( Pomidoras $pomObj){

        $this ->data['darzoves'][]=serialize($pomObj);
       
    }

    public function  getAll ( ){
        $all = [];
        foreach ($this ->data['darzoves'] as $darzove){
            $all[] = unserialize($darzove);
        }
        return $all;
        
    }

public function remove($id) {
    foreach ($this->data['darzoves'] as $key => $darzove) {
        $darzove = unserialize($darzove);
          if($darzove->id == $id) {
            unset($this->data['darzoves'][$key]);
        }
    }
}
    public  function auginti(){
        foreach($this->data['darzoves'] as $index => $darzove) { //<--stringas serializuotas
            $darzove = unserialize($darzove); //<-- agurko objektas
            $darzove-> add($darzove->kiekAugti); //<- pridedam agurka
            $darzove-> kiekAugti();
            self::save($index, $darzove);

            // $darzove = serialize($darzove); //<-- vel stringas
            // $_SESSION['darzove'][$index]=$darzove; //<- uzsaugom agurkus, jei & parasytume, tai nereiketu sitos eilutes, bet kituose projektuose ilgesni varianta naudosim SITA
        }
    }

    public  function nuimtiDerliu(){ // $visiAgurkai = &$_SESSION['obj']

    foreach($this->data['darzoves'] as $index => $darzove){
                $darzove = unserialize($darzove);
                $darzove-> nuskintiVisus();
                self::save($index,$darzove);
            }
    }

    
    public function skinti(){
    foreach($this->data['darzoves'] as $index => $darzove ) {
        $darzove = unserialize($darzove);
    if ($_POST['israuti'] == $darzove->id){
        $darzove->count = 0;
        self::save($index,$darzove);
    }
    }
}

 public  function skintiKieki(){
        foreach($this->data['darzoves'] as $index=>$darzove) {
            $darzove = unserialize($darzove);
        if ($_POST['skinti'] == $darzove->id){
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