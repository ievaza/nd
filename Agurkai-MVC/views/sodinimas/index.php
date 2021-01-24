<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" defer integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
    <script src="http://localhost/PHP/nd/Agurkai-MVC/js/sodinimas.js" defer></script>
    <script> const apiUrl = './sodinimas';</script> 
    <title>Sodinimas</title>
    
</head>

<body>
<div class="box">

<nav>
<a href="<?= URL.'auginimas'?>">auginimas</a>
<a href="<?= URL.'sodinimas'?>">sodinimas</a>
<a href="<?= URL.'skynimas'?>">skynimas</a>
</nav>

<h1>Agurkų sodas</h1>
<h3>Sodinimas</h3>
    <div id="error"></div>
    <form >
<div id="list">
</div>
    <input class="input"  type="text" name="kiekA">
    <button class="sodintiAgurka" type="button" name="cucumber" id="cucumber">SODINTI AGURKA</button>  

    <input class="input"  type="text" name="kiekP">
    <button class="sodintiPomidora" type="button" name="tomato" id="tomato">SODINTI POMIDORA</button>  

    </form>

</div>
</body>
</html>