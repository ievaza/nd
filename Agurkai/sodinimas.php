<?php
session_start();

if (!isset($_SESSION['darzove'])) {
    $_SESSION['darzove'] = []; 
    $_SESSION['ID']=0;
    
}
include __DIR__.'/Darzove.php';

include __DIR__.'/Agurkas.php';
include __DIR__.'/Pomidoras.php';


// SODINIMO SCENARIJUS

if(isset($_POST['sodinti'])){

    if ($_POST['sodinti']=="agurkas") {

    $agurkasObj = new Agurkas($_SESSION['ID']);
    $_SESSION['darzove'][]= serialize($agurkasObj);
    $_SESSION['ID']++;
   
} elseif ($_POST['sodinti']=="pomidoras") {
    
        $pomObj = new Pomidoras($_SESSION['ID']);

        $_SESSION['darzove'][]= serialize($pomObj);
        $_SESSION['ID']++;

}
header('Location: http://localhost/PHP/nd/Agurkai/sodinimas.php');
    exit;
}


// ISROVIMO SCENARIJUS
if (isset($_POST['rauti'])) {

    foreach($_SESSION['darzove'] as $index => $agurkas) {
        $agurkas = unserialize($agurkas);
        if ($_POST['rauti'] == $agurkas->ID) {
            unset($_SESSION['darzove'][$index]);
            header('Location: http://localhost/PHP/nd/Agurkai/sodinimas.php');
            exit;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <title>Sodinimas</title>
    
</head>

<body>
<div class="box">

<nav>
<a href="http://localhost/PHP/nd/Agurkai/auginimas.php">auginimas</a>
<a href="https://localhost/PHP/nd/Agurkai/sodinimas.php">sodinimas</a>
<a href="https://localhost/PHP/nd/Agurkai/skynimas.php">skynimas</a>
</nav>

<h1>Agurkų sodas</h1>
<h3>Sodinimas</h3>
<!-- $_SESSION['darzove'][$_post['sodinti']] -->
    <form action="" method="post">
    <?php foreach($_SESSION['darzove'] as $darzove): ?>

        <?php $darzove = unserialize($darzove) ?>
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


