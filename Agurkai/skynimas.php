<?php
defined('DOOR_BELL')||die('iejimas tik pro duris');

// session_start();

include __DIR__.'/App.php';

include __DIR__.'/Darzove.php';
include __DIR__.'/Agurkas.php';
include __DIR__.'/Pomidoras.php';

App::session();

if (isset($_POST['skintiVisus'])) {
    App::nuimtiDerliu($_SESSION['darzove']);
}

if(isset($_POST['israuti'])){
    App::skinti();
    App::redirect('skynimas');
}

if (isset($_POST['skinti'])){ //tam tikra kieki
    App::skintiKieki();
    App::redirect('skynimas');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skynimas</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
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
  
   <?php foreach($_SESSION['darzove'] as $darzove): ?>
    <form action="" method="post">
    <?php $darzove = unserialize($darzove);?>

    <?php if ($darzove instanceof Agurkas):?>
   
    <div class="row">
    <div class="cucumber"> <img src="img/agurkas.jpg" alt="agurkas" ></div>
    <div class="nr">Agurkas Nr. <?= $darzove->ID ?> </div> 
    <?php if ($darzove->count==0): ?>
    <div class="nr ">Negalima skinti agurku</div> 
    <?php else: ?>
        <div class="count "> Galima skinti <?= $darzove->count?></div> 
   
    <input class="kiekis" type="text" name="kiek">
    <button class="two-btn" type="submit" name="skinti"  value="<?= $darzove->ID?>" >Skinti</button>
    <button class="two-btn" type="submit" name="israuti" value="<?= $darzove->ID?>" >SKINTI VISUS</button>
    <?php endif ?>
    </div>

    <?php else: ?>

    <div class="row">
    <div class="cucumber"> <img src="img/tomato.jpg" alt="pomidoras" ></div>
    <div class="nr">Pomidoras Nr. <?= $darzove->ID ?> </div> 
    <?php if ($darzove->count==0): ?>
    <div class="nr ">Negalima skinti pomidoru</div> 
    <?php else: ?>
        <div class="count "> Galima skinti <?= $darzove->count?></div> 
   
    <input class="kiekis" type="text" name="kiek">
    <button class="two-btn" type="submit" name="skinti"  value="<?= $darzove->ID?>" >Skinti</button>
    <button class="two-btn" type="submit" name="israuti" value="<?= $darzove->ID?>" >SKINTI VISUS</button>
    <?php endif ?>
    </div>
    
    <?php endif ?>
    </form> 
    <?php endforeach ?>

     <form action="" method="post">
       <button class="last-btn" type="submit" name="skintiVisus" >Nuimti visa derliu</button>  
     </form>

    </div>
</body>
</html>