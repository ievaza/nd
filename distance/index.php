<?php

session_start();
if(!empty($_POST)){

    $town1 = $_POST['m1'];
    $town2 = $_POST['m2'];
    // Api start

    $ch = curl_init(); //inicijuojam obj resursa

    // var_dump($ch);
    // die;

    curl_setopt($ch, CURLOPT_URL,
    'https://www.distance24.org/route.json?stops='.$town1.'|'.$town2);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); //norint kazka gaut reikia nepamirsti pasireturnint, kitaip nieko negausim. MUST HAVE

    $answer = curl_exec($ch);//siunciame tuo adresu(16) uzklausa ir laukimas atsakymo
    $answer = json_decode($answer); //issikoduojam ir gaunam standartini json obj 

    _d($answer);

    $dist = $answer->distance;

    // Api end 
    $_SESSION['distance'] = $dist;
    $_SESSION['t1'] = $town1;
    $_SESSION['t2'] = $town2;
    $_SESSION['img1'] = $answer->stops[0]->wikipedia->image;
    $_SESSION['img2'] = $answer->stops[0]->wikipedia->image;



    
    header('Location:https://localhost/PHP/nd/distance/');
    exit;
    


}
 if(isset($_SESSION['distance'])){
    $dist =  $_SESSION['distance'] ;
    $town1 = $_SESSION['t1'] ;
    $town2 = $_SESSION['t2'] ;
    $img1 =  $_SESSION['img1'];
    $img2 =  $_SESSION['img2'];

    unset($_SESSION['distance'],  $_SESSION['t1'] ,  $_SESSION['t2'],  $_SESSION['img1'], $_SESSION['img2']);
 }
   


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API</title>
</head>
<body>
<h1> Atstumu API</h1>
<form action="" method="post">

<input type="text" name="m1" value="<?= $town1 ?? '' ?>">
<input type="text" name="m2" value="<?= $town2 ?? '' ?>">

<button type="submit">GAUTI ATSTUMA</button>


</form>

<?php if(isset($dist)):?>
    <h2> Atstumas yra <?= $dist ?? ''?> KM </h2>
    <img style= "width:50px;"src="<?=$img1 ?? '' ?>" alt="">
    <img style= "width:50px;"src="<?=$img2 ?? '' ?>" alt="">

<?php endif ?>


</body>
</html>


