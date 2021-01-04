<?php

session_start();

if (!isset($_SESSION['a'])) {
    $_SESSION['a'] = [];
    $_SESSION['agurku ID'] = 0;
}
_d($_SESSION);

// SODINIMO SCENARIJUS
if (isset($_POST['sodinti'])) {

    $_SESSION['a'][] = [
        'id' => ++$_SESSION['agurku ID'],
        'agurkai' => 0
    ];
    header('Location: http://localhost/PHP/nd/Agurkai/sodinimas.php');
    exit;
}
// ISROVIMO SCENARIJUS
if (isset($_POST['rauti'])) {
    foreach($_SESSION['a'] as $index => $agurkas) {
        if ($_POST['rauti'] == $agurkas['id']) {
            unset($_SESSION['a'][$index]);
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
    <?php foreach($_SESSION['a'] as $agurkas): ?>

    <div class="row">
    <div class="cucumber" > <img src="agurkas.jpg" alt="agurkas" ></div>
    <div class="nr"> Agurkas nr. <?= $agurkas['id'] ?></div> 
    <div class="count" > Agurkų: <?= $agurkas['agurkai'] ?> </div> 
    <button class="sumbit" type="submit" name="rauti" value="<?= $agurkas['id'] ?>">Išrauti</button>
    </div>


    <?php endforeach ?>
    <button class="last-btn" type="submit" name="sodinti">SODINTI</button>
    </form>

</div>
</body>
</html>