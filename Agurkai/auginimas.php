<?php
session_start();


if (!isset($_SESSION['a'])) {
    $_SESSION['a'] = [];
    $_SESSION['agurku ID'] = 0;
}
// AUGINIMO SCENARIJUS
if (isset($_POST['auginti'])) {
    foreach($_SESSION['a'] as $index => &$agurkas) {
        $agurkas['agurkai'] += $_POST['kiekis'][$agurkas['id']];
    }
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
    <?php foreach($_SESSION['a'] as $agurkas): ?>

    <div class="row">
    <?php $kiekis = rand(2, 9) ?>

    <div class="cucumber"> <img src="agurkas.jpg" alt="agurkas"></div>
    <div class="nr">Agurkas Nr. <?= $agurkas['id'] ?> </div>
    <div class="count"><?= $agurkas['agurkai'] ?></div>
    <div class="count">+<?= $kiekis ?></div>

    <input type="hidden" name="kiekis[<?= $agurkas['id'] ?>]" value="<?= $kiekis ?>">
    </div>

    <?php endforeach ?>
    <button class="last-btn" type="submit" name="auginti">Auginti</button>
    </form>

</div>
</body>
</html>