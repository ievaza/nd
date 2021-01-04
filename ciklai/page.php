<?php

session_start();

if (!isset($_SESSION['logged'] ) || 1 != $_SESSION['logged']){
    header ('Location: https://www.localhost.com/PHP/Ciklai/login.php');
            die;
}


?>

<h1> SLAPTAS PAGE </h1>