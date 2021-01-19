<?php
defined('DOOR_BELL')||die('iejimas tik pro duris');

// session_start();

// include __DIR__.'/App.php';

// include __DIR__.'/Darzove.php';
// include __DIR__.'/Agurkas.php';
// include __DIR__.'/Pomidoras.php';

// App::session();

    use Main\Store;
    use Main\App;
    use Cucumber\Agurkas;
    use Tomato\Pomidoras;

$store = new Store('darzoves');

//lista kuriam

if('POST' == $_SERVER['REQUEST_METHOD']){ 
        
       $rawData = file_get_contents("php://input"); 
       $rawData = json_decode($rawData,1);

//LISTO SCENARIJUS

     if (isset($rawData['list'])){
        ob_start();
        include __DIR__.'/list-harvest.php';
        $out=  ob_get_contents();
        ob_end_clean();
        $json = [ 'list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        exit;
     }
        elseif(isset($rawData['skintiVisus'])){
             $store->nuimtiDerliu($rawData['skintiVisus']);

            ob_start();
            include __DIR__.'/list-harvest.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = [ 'list' => $out];
            $json = json_encode($json); //pavercia i json
            header('Content-type: application/json');
            http_response_code(201); //pridejimo kodas
            echo $json;
            exit;
        }     
        elseif (isset($rawData['skinti'])){
         $store->skintiKieki();

            ob_start();
            include __DIR__.'/list-harvest.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = [ 'list' => $out];
            $json = json_encode($json); //pavercia i json
            header('Content-type: application/json');
            http_response_code(201); //pridejimo kodas
            echo $json;
            exit;
        } 
        elseif (isset($rawData['israuti'])){
         $store->skinti();
              ob_start();
            include __DIR__.'/list-harvest.php';
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
// if (isset($_POST['skintiVisus'])) {
//     $store->nuimtiDerliu($_POST['skintiVisus']);
// }

// if(isset($_POST['israuti'])){
//     $store->skinti();
//     App::redirect('skynimas');
// }

// if (isset($_POST['skinti'])){ //tam tikra kieki
//     $store->skintiKieki();
//     App::redirect('skynimas');
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skynimas</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" defer integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
    <script src="http://localhost/PHP/nd/Agurkai-API/js/skynimas.js" defer></script>
    <script> const apiUrl = 'http://localhost/PHP/nd/Agurkai-API/skynimas';</script> 
</head>
<style>
    .box{
        width:800px;
    }
    a{
        margin-left: 90px;
    }
</style>
<body>
<div class="box">
<nav>
<a href="<?= URL.'auginimas'?>">auginimas</a>
<a href="<?= URL.'sodinimas'?>">sodinimas</a>
<a href="<?= URL.'skynimas'?>">skynimas</a> 
</nav>


<h1>Daržovių sodas</h1>
<h3>Skynimas</h3>

    <h3 style="color:red;">
     <?php
        if(isset($_SESSION['err'])){
            echo $_SESSION['err'];
            unset($_SESSION['err']);
        }
        ?>
    </h3>
  
  <div id='list'></div>


     <form >
       <button class="last-btn" type="button" name="skintiVisus" id="skintiVisus" >Nuimti visa derliu</button>  
     </form>

    </div>
</body>
</html>