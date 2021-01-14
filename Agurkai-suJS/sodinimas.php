<?php
defined('DOOR_BELL')||die('iejimas tik pro duris');

  use Main\Store;
    use Main\App;
    use Cucumber\Agurkas;
    use Tomato\Pomidoras;


$store = new Store('agurkas');
_d($store);


// if('POST' == $_SERVER['REQUEST_METHOD']){
        
//        $rawData = file_get_contents("php://input"); 
//        $rawData = json_decode($rawData,1);
// }

// $rawData pakeiciem vietoj POST



if (isset($_POST['sodinti'])){
    print_r($_POST);
    $kiekis = (int) $_POST['kiekis'];
 
        if (0 > $kiekis || 4 < $kiekis) { // <--- validacija
            if (0 > $kiekis) {
                $error = 1; // <-- neigiamas agurku kiekis
            }
            elseif(4 < $kiekis) {
                $error = 2; // <-- per daug
            }
    

        header('Location:'.URL.'sodinimas');
        exit;
        
    }

    foreach (range(1,$kiekis) as $_){
        $agurkasObj = new Agurkas($store->getNewId());
        $store->addNew($agurkasObj);
    }
    App::redirect('sodinimas');

}



// if(isset($_POST['sodintiA'])){

//         $agurkasObj = new Agurkas($store -> getNewId());
//         $store->addNewAgurkas( $agurkasObj);
   
//     App::redirect('sodinimas'); 
// }

// if(isset($_POST['sodintiB'])){

//         $pomObj = new Pomidoras($store -> getNewId());
//         $store->addNewPom( $pomObj);
   
//     App::redirect('sodinimas'); 
// }


if (isset($_POST['rauti'])) {
    $store->remove($_POST['rauti']);
_d($_POST['rauti']);

    App::redirect('sodinimas');
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
    <!-- <script src="http://localhost/PHP/nd/Agurkai-suJS/app.js" defer></script> -->
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
    <form action="" method="post">
<div id="list">

    <?php foreach( $store->getAll() as $agurkas): ?>
  
    <div>

    Agurkas nr. <?= $agurkas->ID ?>
    Agurkų: <?= $agurkas->count ?>
    <button type="submit" name="rauti" value="<?= $agurkas->ID ?>">Išrauti</button>
    </div>
    <?php endforeach ?>

</div>
    <input type="text" name="kiekis">
    <button type="sumbit" name="sodinti">SODINTI</button>

    </form>

</div>
</body>
</html>

