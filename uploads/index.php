<form action="" method="post" enctype="multipart/form-data">

<input type="file" name="mano_failas" > <br>
<button type="submit"> PRIDETI</button>


</form>

<?php

if ($_SERVER['REQUEST_METHOD']== 'POST'){
    move_uploaded_file($_FILES['mano_failas']['tmp_name'], __DIR__.'/'.$_FILES['mano_failas']['name']);
}


// _d($_FILES); destyto funkcija 