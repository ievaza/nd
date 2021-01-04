<?php
// which method used
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo 'post method';
    $g = 'green';
    header('Location:https://localhost/PHP/Ciklai/forma/nd7.php');
    die;

}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo 'get method';
    $g = 'yellow';

}
?>


<form action="" method="GET">
<button type="submit" >yellow</button>
</form>
<form action="" method="POST">
<button type="submit" >green </button>
</form>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nd7</title>
</head>

<style>

body {
    background: <?= $g ?>;
}
    
    </style>


<body>
</body>
</html>
<?php


// if (isset($_GET['green'])){
//     echo '<style>html{background:green;}</style>';
// }
// if (isset($_POST['yellow'])){
//     echo '<style>html{background:yellow;}</style>';  
// }
