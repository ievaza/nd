<?php
defined('DOOR_BELL')||die('iejimas tik pro duris');

// session_start();

  use Main\Store;
    use Main\App;
    use Cucumber\Agurkas;
    use Tomato\Pomidoras;

$store = new Store('darzoves');

if('POST' == $_SERVER['REQUEST_METHOD']){
        
       $rawData = file_get_contents("php://input"); 
       $rawData = json_decode($rawData,1);

        if (isset($rawData['list'])) {
            ob_start();
            include __DIR__.'/list-grow.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['list' => $out];
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(200);
            echo $json;
            die;
        }

        elseif(isset($rawData['auginti'])){
            $store->auginti(); 

            ob_start();
            include __DIR__.'/list-grow.php';
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



// if (isset($_POST['auginti'])) {
//     $store->auginti();
//     App::redirect('auginimas');
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auginimas</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" defer integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
    <script src="http://localhost/PHP/nd/Agurkai-suJS/js/auginimas.js" defer></script>
    <script> const apiUrl = 'http://localhost/PHP/nd/Agurkai-suJS/auginimas';</script> 


</head>

<body>
<div class="box">

<nav>
<a href="<?= URL.'auginimas'?>">auginimas</a>
<a href="<?= URL.'sodinimas'?>">sodinimas</a>
<a href="<?= URL.'skynimas'?>">skynimas</a>
</nav>

<h1>Agurkų sodas</h1>
<h3>Auginimas</h3>

    <div id="error"></div>
    <form>
    
    <div id="list"></div>

    <button class="last-btn" type="button" name="auginti" id="auginti">Auginti</button>
    </form>

</div>
</body>
</html>