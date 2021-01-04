<?php
if (isset($_GET['need_redirect'])){
    header('Location: https://localhost/PHP/Ciklai/forma/nd5/red.php');
    die;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue</title>
</head>

<style>
body{background:blue;
}
body a{
    color:white;
}

</style>
<body>

<a href="? need_redirect" > LINKAS </a>
    
</body>
</html>
