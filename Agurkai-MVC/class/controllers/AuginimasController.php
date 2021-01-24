<?php
namespace Controllers;

    use Main\Store;
    use Main\App;
    use Cucumber\Agurkas;
    use Tomato\Pomidoras;

    class AuginimasController {
        private $store, $rawData;

    public function __construct(){
        if('POST' == $_SERVER['REQUEST_METHOD']){

            $this->store = new Store('darzoves');
            $this->rawData = file_get_contents("php://input"); 
            $this->rawData = json_decode($this->rawData,1);
        }
    }

    public function index(){
        include DIR.'/views/auginimas/index.php';
    }
        
    public function list(){
        $this->store = new Store('darzoves');
            ob_start();
            $store=$this->store;
            include DIR.'/views/auginimas/list-grow.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['list' => $out];
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(200);
            echo $json;
            die;
        }


    public function grow(){

            $this->store->auginti(); 
            ob_start();
            $store=$this->store;
            include DIR.'/views/auginimas/list-grow.php';
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
