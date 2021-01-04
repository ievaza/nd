<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST 1</title>
    <style>
    .conteiner{
        display: flex;
        align-items: center;
    }
    img{
    max-height:300px;
    }

    label{
        width:100px;
        font-size:40px;
        display: inline-block;
    }
    button{
        font-size:40px
    }
    h2{
        text-align: center;
    }
    </style>
</head>
<body>
    <div class="container">
    <img src="briedis.jpg" alt="briedis">
    </div>

<form action="" method="post">
<h2>Vaikai, atspekit, kas tai yra? </h2>
<div class="answer">
    <label> Barsukas </label>
    <input type="radio" name="answer" value="1">
</div>

<div class="answer">
    <label> Bebras </label>
    <input type="radio" name="answer" value="2">
</div>

<div class="answer">
    <label> Briedis </label>
    <input type="radio" name="answer" value="3">
</div>

<div class="answer">
    <label> Bembis </label>
    <input type="radio" name="answer" value="4">
</div>
<br>
<button type="submit">Atsakymas</button>

</form>
    
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD']== 'POST'){

if (!isset($_POST['answer'])){
    echo 'Saunuolis, bet pabandyk pasirinkti atsakyma pries spausdamas';
}

if (3 != ($_POST['answer'])){
    echo 'Pabandyk dar karta pagalvoti';
}

else {
    echo 'Teisingai';
}
header('Location:http://localhost/PHP/nd/test/index.php');
exit;
}






_d($_POST,'POST');