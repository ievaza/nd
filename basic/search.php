<?php
// _d($_GET,'GET MASYVAS');
// _d($_POST,'POST MASYVAS');  

if ($_REQUEST['REQUEST_METHOD'] == 'POST'){
    header ('Location: http://localhost/PHP/nd/basic/search.php');
    exit;
}

?>

<form action="" method="get">

<input type="text" name="q" >
<input type="checkbox" name="checkbox1" value="OK"><br>

<textarea name="ilgas_tekstas" cols="30" rows="10"></textarea><br>

<input type="radio" name="radijo1" value = "1" >
<input type="radio" name="radijo1" value = "2" checked>
<input type="radio" name="radijo1" value = "3" ><br>

<input type="radio" name="radijo2" >
<input type="radio" name="radijo2" >
<input type="radio" name="radijo2" ><br>

<select name="selektas"> 
<option value="o1">option 1</option>
<option value="o2">option 2</option>
</select><br><br>

<input type="range" name="range" ><br>

<input type="file" name="failas"><br><br>

<button type="submit">VARYK!</button>

</form>
<?php if(isset($_GET['q'])):?>

<p> pagal ieskoma fraze <strong><?= $_GET['q'] ?></strong>  nieko nerasta </p> 

<?php endif ?>

<?php


