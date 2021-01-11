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
            file_put_contents(self::PATH.$this->fileName.'.json', json_encode(['darzove' => [], 'ID' => 0 ]));// sukuriam json faila su pradiniu masyvu
            $this->data = ['darzove' => [], 'ID' => 0 ];
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
    
    public function addNewAgurkas ( Agurkas $agurkasObj){
       
        $this ->data['darzove'][]=serialize($agurkasObj);

    }
      
    public function addNewPom ( Pomidoras $pomObj){

        $this ->data['darzove'][]=serialize($pomObj);
       
    }

    public function  getAll ( ){
        $all = [];
        foreach ($this ->data['darzove'] as $darzove){
            $all[] = unserialize($darzove);
        }
        return $all;
        
    }

    public function remove($id){
        foreach($this->data['darzove'] as $index => $darzove){
            $darzove = unserialize($darzove);
            if ($darzove->id == $id){ // su ID gali but klaida.
                unset($this->data['darzove'][$index]);
            }

        }
        
    }

}