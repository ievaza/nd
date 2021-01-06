<?php
session_start();


if (!isset($_SESSION['a'])) {
    // $_SESSION['a'] = [];
    $_SESSION['obj'] = []; //<-- agurko obj
    $_SESSION['agurku ID'] = 0;
}

include __DIR__.'/Agurkas.php';


// SODINIMO SCENARIJUS
if (isset($_POST['sodinti'])) {

$agurkasObj = new Agurkas($_SESSION['agurku ID']);
// $agurkasObj->ID = $_SESSION['agurku ID'] +1;
// $agurkasObj->count = 0;

$_SESSION['obj'][]= serialize($agurkasObj);
$_SESSION['agurku ID']++;

    // $_SESSION['a'][] = [
    //     'id' => ++$_SESSION['agurku ID'],
    //     'agurkai' => 0
    // ];

    header('Location: http://localhost/PHP/nd/Agurkai/sodinimas.php');
    exit;


}
// ISROVIMO SCENARIJUS
if (isset($_POST['rauti'])) {
//     foreach($_SESSION['a'] as $index => $agurkas) {
//         if ($_POST['rauti'] == $agurkas['id']) {
//             unset($_SESSION['a'][$index], $_SESSION['obj'][$index]);
//             header('Location: http://localhost/PHP/nd/Agurkai/sodinimas.php');
//             exit;
//         }
//     }
// }

    foreach($_SESSION['obj'] as $index => $agurkas) {
        $agurkas = unserialize($agurkas);
        if ($_POST['rauti'] == $agurkas->ID) {
            unset($_SESSION['obj'][$index]);
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

    <form action="" method="post">
    <?php foreach($_SESSION['obj'] as $agurkas): ?>
    <?php $agurkas = unserialize($agurkas) ?>

    <div class="row">
    <div class="cucumber" > <img src="agurkas.jpg" alt="agurkas" ></div>
    <div class="nr"> Agurkas nr. <?= $agurkas->ID ?></div> 
    <div class="count" > Agurkų: <?= $agurkas->count ?> </div> 
    <button class="sumbit" type="submit" name="rauti" value="<?= $agurkas->ID ?>">Išrauti</button>
    </div>


    <?php endforeach ?>
    <button class="last-btn" type="submit" name="sodinti">SODINTI</button>
    </form>

</div>
</body>
</html>