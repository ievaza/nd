<?php
defined('DOOR_BELL')||die('iejimas tik pro duris');
// session_start();

// include __DIR__.'/class/App.php';
// include __DIR__.'/Darzove.php';

// include __DIR__.'/Agurkas.php';
// include __DIR__.'/Pomidoras.php';

// Sodas\App::session();
  use Main\Store;
    use Main\App;
    use Cucumber\Agurkas;
    use Tomato\Pomidoras;

$store = new Store('darzoves');
_d($store);


if(isset($_POST['sodinti'])){
    App::sodinti();
    App::redirect('sodinimas'); 
}

if (isset($_POST['rauti'])) {
    $store->remove($_POST['rauti']);
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
    <form action="<?= URL.'sodinimas'?>" method="post">

    <?php foreach($store->getAll() as $darzove): ?>

        <?php if ($darzove instanceof Agurkas):?>
            
        <div class="row">
        <div class="cucumber" > <img src="img/agurkas.jpg" alt="agurkas" ></div>
        <div class="nr"> Agurkas nr. <?= $darzove->ID ?></div> 
        <div class="count" > Agurkų: <?= $darzove->count ?> </div> 
        <button class="sumbit" type="submit" name="rauti" value="<?= $darzove->ID ?>">Išrauti</button>
        </div>
        <?php else: ?>

        <div class="row">
        <div class="cucumber" > <img src="img/tomato.jpg" alt="pomidoras" ></div>
        <div class="nr"> Pomidoras nr. <?= $darzove->ID ?></div> 
        <div class="count" > Pomidoru: <?= $darzove->count ?> </div> 
        <button class="sumbit" type="submit" name="rauti" value="<?= $darzove->ID ?>">Išrauti</button>
        </div>
        <?php endif ?>


    <?php endforeach ?>
    <button class="last-btn" type="submit" name="sodinti" value="agurkas">SODINTI AGURKUS</button>
    <button class="last-btn" type="submit" name="sodinti" value="pomidoras">SODINTI POMIDORUS </button>
    
    </form>
</div>
</body>
</html>


