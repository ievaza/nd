<?php
defined('DOOR_BELL')||die('iejimas tik pro duris');

    use Main\Store;
    use Main\App;
    use Cucumber\Agurkas;
    use Tomato\Pomidoras;

$store = new Store('agurkas');

if('POST' == $_SERVER['REQUEST_METHOD']){
        
       $rawData = file_get_contents("php://input"); 
       $rawData = json_decode($rawData,1);

//LISTO SCENARIJUS

     if (isset($rawData['list'])){
        ob_start();
        include __DIR__.'/list.php';
        $out=  ob_get_contents();
        ob_end_clean();
        $json = [ 'list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        exit;

     }

    elseif (isset($rawData['sodinti'])){

    $kiekis = (int) $rawData['kiekis'];
 
        if (0 > $kiekis || 4 < $kiekis) { // <--- validacija
            if (0 > $kiekis) {
                $error = 1; // <-- neigiamas agurku kiekis
            }
            elseif(4 < $kiekis) {
                $error = 2; // <-- per daug
            }

        //buferai-pilu vandeni ir pakisu kibira ir vanduo jau bega i kibira
        ob_start();
        include __DIR__.'/error.php';
        $out=  ob_get_contents();
        ob_end_clean();
        //vietoj to kad sis failas isecho error mes juos perkelsim i kintamaji, nes kitu atveju, jis net nepadares klaidos jau echo klaida
        $json = [ 'msg' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(400);
        echo $json;
        exit;
        
    }

    foreach (range(1,$kiekis) as $_){
        $agurkasObj = new Agurkas($store->getNewId());
        $store->addNew($agurkasObj);
    } //json faile updatinam agurkus
         ob_start();
        include __DIR__.'/list.php';
        $out=  ob_get_contents();
        ob_end_clean();
        $json = [ 'list' => $out];
        $json = json_encode($json); //pavercia i json
        header('Content-type: application/json');
        http_response_code(201); //pridejimo kodas
        echo $json;
        exit;

}
  
if (isset($_POST['rauti'])) {
    $store->remove($rawData['id']);

        ob_start();
        include __DIR__.'/list.php';
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" defer integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
    <script src="http://localhost/PHP/nd/Agurkai-suJS/app.js" defer></script>
    <script> const apiUrl = './sodinimas';</script> 
    <title>Sodinimas</title>
    
</head>

<body>
<div class="box">

<nav>
<a href="<?= URL.'auginimas'?>">auginimas</a>
<a href="<?= URL.'sodinimas'?>">sodinimas</a>
<a href="<?= URL.'skynimas'?>">skynimas</a>
</nav>

<h1>Agurkų sodas</h1>
<h3>Sodinimas</h3>
<!-- $_SESSION['darzove'][$_post['sodinti']] -->
    <div id="error"></div>
    <form >

<div id="list">


</div>
    <input type="text" name="kiekis">
    <button type="button" name="sodinti" id="sodinti">SODINTI</button>  

    </form>

</div>
</body>
</html>

