<?php
namespace Controllers;

    use Main\Store;
    use Main\App;
    use Main\Catche;
    use Cucumber\Agurkas;
    use Tomato\Pomidoras;

class SodinimasController {

    private $store, $rawData, $DATA, $rate;

    public function __construct() {
        if ('POST'=== $_SERVER['REQUEST_METHOD']){

        $this->store = new Store('darzoves');
        $this->rawData = file_get_contents("php://input"); 
        $this->rawData = json_decode($this->rawData,1);
        $this->DATA = new Catche;
        $this->rate = App::currency($this->DATA);

        
        }

    }

  //CATCHE START
// include __DIR__ .'/Catche.php';
// $DATA = new Catche;

// $rate = App::currency($DATA);

//SODINOMO RODYMO SCENARIJUS
public function index(){
        include DIR.'/views/sodinimas/index.php';
}


//LISTO SCENARIJUS
public function list(){
        $this->store = new Store('darzoves');
        ob_start();
        //kreipiames i view ir perduodam kintamuosius
        $store=$this->store;
        $rate = $this->rate;

        include DIR.'/views/sodinimas/list-plant.php';
        $out=  ob_get_contents();
        ob_end_clean();
        $json = [ 'list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        exit;
}        
     
// SODINU AGURKUS
public function plantCuc(){
        $kiekis = $this->rawData['kiekis'];
 
        if (0 > $kiekis || 4 < $kiekis) {
            if (0 > $kiekis) {
                $error = 1; 
            }
            elseif(4 < $kiekis) {
                $error = 2; 
            }

        ob_start();
        // $rate = $this->rate;
        // $store=$this->store;
        include DIR.'/views/sodinimas/error.php';
        $out=  ob_get_contents();
        ob_end_clean();
        $json = [ 'msg' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(400);
        echo $json;
        exit;
        
    }

    foreach (range(1,$kiekis) as $_){
        $agurkasObj = new Agurkas($this->store->getNewId());
        $this->store->addNewC($agurkasObj);
    } 
        $store=$this->store;
        $rate = $this->rate;
        ob_start();
        include DIR.'/views/sodinimas/list-plant.php';
        $out=  ob_get_contents();
        ob_end_clean();
        $json = [ 'list' => $out];
        $json = json_encode($json); //pavercia i json
        header('Content-type: application/json');
        http_response_code(201); //pridejimo kodas
        echo $json;
        exit;

}
//SODINU POMIDORUS
public function plantTom(){
        $kiekis = $this->rawData['kiekis'];
 
        if (0 > $kiekis || 4 < $kiekis) {
            if (0 > $kiekis) {
                $error = 1; 
            }
            elseif(4 < $kiekis) {
                $error = 2; 
            }
        ob_start();
        include DIR.'/views/sodinimas/error.php';
        $out=  ob_get_contents();
        ob_end_clean();
        $json = [ 'msg' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(400);
        echo $json;
        exit; 
    }

    foreach (range(1,$kiekis) as $_){
        $pomObj = new Pomidoras($this->store->getNewId());
        $this->store->addNewT($pomObj);
    } //json faile updatinam pomidorus
        $store=$this->store;
        $rate = $this->rate;
        ob_start();
        include DIR.'/views/sodinimas/list-plant.php';
        $out=  ob_get_contents();
        ob_end_clean();
        $json = [ 'list' => $out];
        $json = json_encode($json); //pavercia i json
        header('Content-type: application/json');
        http_response_code(201); //pridejimo kodas
        echo $json;
        exit;
}

//ROVIMO SCENARIJUS
    public function remove(){
        $this->store->remove($this->rawData['id']);
        $store=$this->store;
        $rate = $this->rate;
        ob_start();
        include DIR.'/views/sodinimas/list-plant.php';
        $out=  ob_get_contents();
        ob_end_clean();
        $json = [ 'list' => $out];
        $json = json_encode($json); //pavercia i json
        header('Content-type: application/json');
        http_response_code(200); //pridejimo kodas
        echo $json;
        exit;
}
}

