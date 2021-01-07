<?php
session_start();

if (!isset($_SESSION['darzove'])) {
    $_SESSION['darzove'] = []; 
    $_SESSION['ID']=0;
}
include __DIR__.'/Darzove.php';

include __DIR__.'/Agurkas.php';
include __DIR__.'/Pomidoras.php';

// AUGINIMO SCENARIJUS
if (isset($_POST['auginti'])) {

    // foreach($_SESSION['a'] as $index => &$agurkas) { //jei & nebutu tai paimciau kopija su ja kazka padaryciau ir tada reiktu ja vel grazinti i masyva ir pakeiti i kopija 
    //     $agurkas['agurkai'] += $_POST['kiekis'][$agurkas['id']];
    // }

    // unset($agurkas);

    foreach($_SESSION['darzove'] as $index => $darzove) { //<--stringas serializuotas
        $darzove = unserialize($darzove); //<-- agurko objektas
        $darzove-> add($_POST['kiekis'][$darzove->ID]); //<- pridedam agurka
        $darzove = serialize($darzove); //<-- vel stringas
        $_SESSION['darzove'][$index]=$darzove; //<- uzsaugom agurkus, jei & parasytume, tai nereiketu sitos eilutes, bet kituose projektuose ilgesni varianta naudosim SITA
       
    }
 _d($_SESSION);
    // _d($_POST['kiekis']);
    header('Location: http://localhost/PHP/nd/Agurkai/auginimas.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auginimas</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="box">

<nav>
<a href="http://localhost/PHP/nd/Agurkai/auginimas.php">auginimas</a>
<a href="https://localhost/PHP/nd/Agurkai/sodinimas.php">sodinimas</a>
<a href="https://localhost/PHP/nd/Agurkai/skynimas.php">skynimas</a>
</nav>

<h1>Agurkų sodas</h1>
<h3>Auginimas</h3>

    <form action="" method="post">
    <?php foreach($_SESSION['darzove'] as $darzove): ?>
    <?php  $darzove = unserialize($darzove); ?>
    
    

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