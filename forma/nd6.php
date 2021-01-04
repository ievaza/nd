<?php
// which method used
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $g = 'yellow';
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $g = 'green';
}
?>


<form action="" method="GET">
<button type="submit" >green</button>
</form>
<form action="" method="POST">
<button type="submit" >yellow </button>
</form>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
