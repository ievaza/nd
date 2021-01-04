//prisiloginimo 
<?php
session_start();

if(isset($_GET['logout'])){
    $_SESSION['logged'] = 0;
    header ('Location: https://www.localhost.com/PHP/Ciklai/login.php');
            die;
}

if ( isset($_SESSION['logged']) && 1 == $_SESSION['logged']) {
    die ('tu prisijunges eik is cia ');
}



if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = json_decode(file_get_contents('data.json'),1); //default pavercia i masyva , jei 1 tai string
    foreach ($data as $user) {
        if (($_POST['email']?? '')=== $user['email']&&
        md5($_POST['pass']?? '')=== $user['pass'] //suhahintas todel ir man reikia suheshinti 
        )
        {
            $_SESSION['name'] = $user['name'];
            $_SESSION['logged'] = 1;
            header ('Location: https://www.localhost.com/PHP/Ciklai/page.php');
            die;
        }
    }
        $_SESSION['msg'] = 'Bad email or password';
         header ('Location: https://www.localhost.com/PHP/Ciklai/login.php');
        die;

}

if(isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>

<div> <=? $msg ?? '' ?> </div>
    <form action="" method="POST">
    name:<br>
    <input type="text" name = "email" value="Mickey">
    <br>
    password:<br>
    <input type="password" name = "pass" value="">
    <br>
    <br>
    <input type="sumbit" value="Login">
    
    
    
    </form>
</body>
</html>