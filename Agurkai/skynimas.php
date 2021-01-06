<?php

session_start();

// echo "<pre>";

if (!isset($_SESSION['a'])) {
    // $_SESSION['a'] = [];
    $_SESSION['obj']=[];
    $_SESSION['agurku ID'] = 0;
}

include __DIR__.'/Agurkas.php';


// ISROVIMO SCENARIJUS visus visus agurkus VEIKIA!!!
if (isset($_POST['skintiVisus'])) {
    // foreach($_SESSION['a'] as $index => &$agurkas ) {
    //     // $_SESSION['a'][$agurkas]=0;
    //     $agurkas['agurkai'] = 0;
    //     }
    //     header('Location: http://localhost/PHP/nd/Agurkai/skynimas.php');
    //         exit;
    // }

    $_SESSION['obj'] = Agurkas::nuimtiDerliu($_SESSION['obj']);

    }

    
//ISRAUTI TAM TIKRA AGURKA 

if(isset($_POST['israuti'])){
    foreach($_SESSION['obj'] as $index => $agurkas ) {
        $agurkas = unserialize($agurkas);
    if ($_POST['israuti'] == $agurkas->ID){
        $agurkas->count = 0;
        $agurkas = serialize($agurkas);
        $_SESSION['obj'][$index]=$agurkas;
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
    foreach($_SESSION['obj'] as $index=>$agurkas) {
        $agurkas = unserialize($agurkas);
        if ($_POST['skinti'] == $agurkas->ID){
              $kiekis = (int) $_POST['kiek'];
        if ($kiekis < 0 || $kiekis > $agurkas->count){
            $_SESSION['err'] = 'Blogas kiekis';
            header('Location: http://localhost/PHP/nd/Agurkai/skynimas.php');
            exit;}

                $agurkas->count -= $kiekis;  
                $agurkas= serialize($agurkas);
                $_SESSION['obj'][$index]=$agurkas;


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


<h1>Agurkų sodas</h1>
<h3>Skynimas</h3>

    

    <h3 style="color:red;">
     <?php
        if(isset($_SESSION['err'])){
            echo $_SESSION['err'];
            unset($_SESSION['err']);
        }
        ?>
    </h3>
  
   <?php foreach($_SESSION['obj'] as $agurkas): ?>
   <?php $agurkas = unserialize($agurkas);?>
  <form action="" method="post">

    <div  >
    <div class="cucumber"> <img src="agurkas.jpg" alt="agurkas" ></div>
    <div class="nr">Agurkas Nr. <?= $agurkas->ID ?> </div> 
    <?php if ($agurkas->count==0): ?>
    <div class="nr ">Negalima skinti agurku</div> 
    <?php else: ?>
        <div class="count "> Galima skinti <?= $agurkas->count?></div> 
   
    <input class="kiekis" type="text" name="kiek">
    <button class="two-btn" type="submit" name="skinti"  value="<?= $agurkas->ID?>" >Skinti</button>
    
    <?php _d($_SESSION);?>

    <button class="two-btn" type="submit" name="israuti" value="<?= $agurkas->ID?>" >SKINTI VISUS</button>
    <?php endif ?>
    </div>
    
    </form> 
     <?php endforeach ?>
     <form action="" method="post">
       <button class="last-btn" type="submit" name="skintiVisus" >Nuimti visa derliu</button>  
     </form>
    


    </div>
</body>
</html>