
<form action="" method="POST">

<input type="text" name="x" value="<?= $_POST['x']?? ""?>"><br>
<input type="text" name="y" value="<?= $_POST['y']?? ""?>"><br>
<div style="background=red;"></div>
<body style='background-color:pink'>
<button type="submit"> SIUSTI </button>
</fotm>


<?php

if (!empty($_POST)) {

       $rez = (float)($_POST['x']??0) + (float)($_POST['y']??0);

       echo $rez; 


}
//   echo "<body style='background-color:pink'>";