<?php

session_start();

if (!isset($_SESSION['darzove'])) {
    $_SESSION['darzove']=[];
    $_SESSION['ID'] = 0;
}
include __DIR__.'/Darzove.php';
include __DIR__.'/Agurkas.php';
include __DIR__.'/Pomidoras.php';


// ISROVIMO SCENARIJUS visus visus agurkus VEIKIA!!!
if (isset($_POST['skintiVisus'])) {
    // foreach($_SESSION['a'] as $index => &$agurkas ) {
    //     // $_SESSION['a'][$agurkas]=0;
    //     $agurkas['agurkai'] = 0;
    //     }
    //     header('Location: http://localhost/PHP/nd/Agurkai/skynimas.php');
    //         exit;
    // }

    $_SESSION['darzove'] = Darzove::nuimtiDerliu($_SESSION['darzove']); //padaryti darzove

    }

    
//ISRAUTI TAM TIKRA AGURKA 

if(isset($_POST['israuti'])){
    foreach($_SESSION['darzove'] as $index => $darzove ) {
        $darzove = unserialize($darzove);
    if ($_POST['israuti'] == $darzove->ID){
        $darzove->count = 0;
        $darzove = serialize($darzove);
        $_SESSION['darzove'][$index]=$darzove;
        header('Location: http://localhost/PHP/nd/Agurkai/skynimas.php');
            exit;
         }
    }
}

// SKINTI 

if (isset($_POST['skinti'])){

//     foreach($_SESSION['a'] as &$agurkas) {
//         if ($_POST['skinti'] == $agurkas['id']){
//               $kiekis = (int) $_POST['kiek'];
//         if ($kiekis < 0 || $kiekis > $agurkas['agurkai']){
//             $_SESSION['err'] = 'Blogas kiekis';
//             header('Location: http://localhost/PHP/nd/Agurkai/skynimas.php');
//             exit;}

//                 $agurkas['agurkai'] -= $kiekis;  
//                 header('Location: http://localhost/PHP/nd/Agurkai/skynimas.php');
//                 exit;
                 
//         }
//     }
// }
    foreach($_SESSION['darzove'] as $index=>$darzove) {
        $darzove = unserialize($darzove);
        if ($_POST['skinti'] == $darzove->ID){
              $kiekis = (int) $_POST['kiek'];
        if ($kiekis < 0 || $kiekis > $darzove->count){
            $_SESSION['err'] = 'Blogas kiekis';
            header('Location: http://localhost/PHP/nd/Agurkai/skynimas.php');
            exit;}

                $darzove->count -= $kiekis;  
                $darzove= serialize($darzove);
                $_SESSION['darzove'][$index]=$darzove;


                header('Location: http://localhost/PHP/nd/Agurkai/skynimas.php');
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
    <title>Skynimas</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
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
<a href="http://localhost/PHP/nd/Agurkai/auginimas.php">auginimas</a>
<a href="https://localhost/PHP/nd/Agurkai/sodinimas.php">sodinimas</a>
<a href="https://localhost/PHP/nd/Agurkai/skynimas.php">skynimas</a>
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