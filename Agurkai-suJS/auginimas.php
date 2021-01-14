<?php
defined('DOOR_BELL')||die('iejimas tik pro duris');

// session_start();

  use Main\Store;
    use Main\App;
    use Cucumber\Agurkas;
    use Tomato\Pomidoras;

$store = new Store('darzove');


// App::session();



if (isset($_POST['auginti'])) {
    $store->auginti();
    App::redirect('auginimas');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auginimas</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
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

    <form action="" method="post">
    <?php foreach($store->getAll() as $darzove): ?>
   
    
    <?php if ($darzove instanceof Agurkas):?>
     <?php $kiekis = rand(2, 9) ?>       
        <div class="row">
            <div class="cucumber" > <img src="img/agurkas.jpg" alt="agurkas" ></div>
            <div class="nr"> Agurkas nr. <?= $darzove->ID ?></div> 
            <div class="count" > Agurkų: <?= $darzove->count ?> </div> 
            <div class="count">+<?= $kiekis ?></div>
        </div>

        <?php else: ?>
        <?php $kiekis = rand(1, 3) ?>       
        <div class="row">
            <div class="cucumber" > <img src="img/tomato.jpg" alt="pomidoras" ></div>
            <div class="nr"> Pomidoras nr. <?= $darzove->ID ?></div> 
            <div class="count" > Pomidoru: <?= $darzove->count ?> </div> 
            <div class="count">+<?= $kiekis ?></div>
        </div>  
    <?php endif ?>
    <input type="hidden" name="kiekis[<?= $darzove->ID?>]" value="<?= $kiekis ?>">
    <?php endforeach ?>
    <button class="last-btn" type="submit" name="auginti">Auginti</button>
    </form>

</div>
</body>
</html>