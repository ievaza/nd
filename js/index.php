<?php
// sleep(2);
$gautaInfo = 'Info nerasta';
    if(!empty($_POST)){
        $gautaInfo = $_POST['info'];
        //reikia po POST pasidaryt redirect
        // header('Location:http://localhost/PHP/nd/js/');
        // exit;
        
    }

    elseif('POST' == $_SERVER['REQUEST_METHOD']){
        
       $rawData = file_get_contents("php://input"); //input stream, susemia info 
       $rawData = json_decode($rawData);//issikoduoja faila, jei 1 pridesim tai gausim masyva, o be 1 tai gaunam standartines klases obj

        $answer = '  <h1 style="color:blue;">'.$rawData->input.'</h1>'; 
        //siunciam json,negalim  echo
        //json stringas
        $json = ['ans' => $answer, 'msg' => 'linkejimai is serverio'];

        $json = json_encode($json);

        //nurodom, kad siunciam json kitu atveju jei siunciam kaip virsui tiesiog issiusim string text pavidale, reikia siusti header
      
        header('Content-type: application/json');

        echo $json; // echo t.y. nespausdinimas, o informacijos isskyrimas is php, php padaro savo darba is viska ismeta, atiduoda isorei

       die; // butina numirt, nes kitaip viska toliau isecho ir kai prie  json viskas prisijungs niekas nieko nesupras

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JS</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" defer integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
    <script src="http://localhost/PHP/nd/js/app.js" defer></script>
    <script> const apiUrl = './index.php';</script> 
</head>
<body>

<h1 style="color:red;"> <?= $gautaInfo ?> </h1>

<p>Klasika</p>
<form action="" method="post">
<label> Pateikti info:</label>
<input type="text" name="info" id="infoc">
<button type="submit">Pateikti info </button>
</form>
    
<div id="atsakymas"></div>
    
<p>JS</p>
<form action="" method="post">
<label> Pateikti info:</label>
<input type="text" name="info" id="infojs">
<button type="button">Pateikti info </button>
</form>


</body>
</html> 