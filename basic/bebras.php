<a href="?p=1">1</a>
<a href="?p=2">2</a>


<?php

/*
$_GET get metodu perduodami kintamieji
$_POST post metudo perduodami kintamieji
$_COOKIE kukiu masyvas, jame yra visi is narsyles ateje kukiai


$_REQUEST abieju masyvu ir cookie suma <-- nenaudoti, techninio blogumo nera, bet jei naudojam ji tai reiskiasi, kad kode visiskai nesigaudom
senas labia masyvas paliktas, NENAUDOTI

*/

?>

<?php if(!isset($_GET['p']) || 1== $_GET['p']):?>

<h1> PUSLAPIS 1 </h1>

<?php elseif(isset($_GET['p']) && 2 == $_GET['p']):?>

<h1> PUSLAPIS 2 </h1>

 <?php else: ?>

<h1> PUSLAPIS tokio nera </h1>

 <?php endif ?>

 