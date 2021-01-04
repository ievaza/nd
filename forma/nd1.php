<?php

if (isset($_GET['color'])){
  if ($_GET['color']==1){
    $bgColor = '#ff0000';
  } 
  if ($_GET['color']==2){
       $bgColor = '#00ff00';}
}
else {
    $bgColor = '#000';
  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>nd1</title>
</head>
<style>
body{
  background:<?= $bgColor ?>;
  color:white;
}
body a {
  color:white;
}
</style>

<body>
<a href="https://localhost/PHP/Ciklai/forma/nd1.php?color=1"> MAKE RED </a> <br>
<a href="https://localhost/PHP/Ciklai/forma/nd1.php?"> MAKE BLACK</a> <br>
<a href="https://localhost/PHP/Ciklai/forma/nd1.php?color=2"> MAKE GREEN</a>

</body>


</html>


<!-- <a href='?'>Nuoroda i save</a><br>
<a href='?color=1'>Nuoroda su GET</a><br>
?php//uzdete rodykle
echo '<style>html{background:black;}</style>';
if (isset($_GET['color'])){
    if ($_GET['color']==1){
      echo '<style>html{background:red;}</style>';
    }
} -->
