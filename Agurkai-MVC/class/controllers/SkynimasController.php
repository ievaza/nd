<?php
namespace Controllers;
    use Main\Store;
    use Main\App;
    use Cucumber\Agurkas;
    use Tomato\Pomidoras;


class SkynimasController {

    private $rawData, $store;

    public function _construct(){    
        if('POST' == $_SERVER['REQUEST_METHOD']){ 
        $this->store = new Store('darzoves');
        $this->rawData = file_get_contents("php://input"); 
        $this->rawData = json_decode($this->rawData,1);
        }
    }

    public function index(){
        include DIR.'/views/skynimas/index.php';
    } 

    public function list(){
        $this->store = new Store('darzoves');
        $store = $this->store;
        ob_start();
        include DIR.'/views/skynimas/list-harvest.php';
        $out=  ob_get_contents();
        ob_end_clean();
        $json = [ 'list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        exit;
     }

    public function harvestOne(){
        $this->store->harvestOne($this->rawData['id']);
        
            $this->store->harvestOne();
            $store = $this->store;
            ob_start();
            include DIR.'/views/skynimas/list-harvest.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = [ 'list' => $out];
            $json = json_encode($json); //pavercia i json
            header('Content-type: application/json');
            http_response_code(201); //pridejimo kodas
            echo $json;
            exit;
    }

    public function harvest(){
        $kiekis = (int) $this->rawData['skintiKiek'];
        $this->store->harvest($this->rawData['id'], $kiekis);

        $store = $this->store;
        ob_start();
        include DIR.'/views/skynimas/list-harvest.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = [ 'list' => $out];
        $json = json_encode($json); //pavercia i json
        header('Content-type: application/json');
        http_response_code(201); //pridejimo kodas
        echo $json;
        exit;
    }

    public function harvestAll(){

        $this->store->harvestAll();
        $store = $this->store;
        ob_start();
        include DIR.'/views/skynimas/list-harvest.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = [ 'list' => $out];
        $json = json_encode($json); //pavercia i json
        header('Content-type: application/json');
        http_response_code(201); //pridejimo kodas
        echo $json;
        exit;
    }
}
